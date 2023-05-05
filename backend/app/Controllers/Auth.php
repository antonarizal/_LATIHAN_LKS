<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Auth extends ResourceController
{
    public function __construct(){

        $this->db = \Config\Database::connect();
    }
    public function login(){
        $post = $this->request->getPost();
        $id_card_number = $post["id_card_number"];
        $data= [
            "token"=> md5($id_card_number)
        ];
        $password = $post["password"];
        $where = ["id_card_number"=>$id_card_number, "password"=>$password];
        $resp = $this->db->table("societies")->where($where)
                ->get()->getRowArray();
        
        if($resp){

            // menambahkan token ke societies (update login_tokens)
            $resp["login_tokens"] = md5($id_card_number);
            $this->db->table("societies")->where($where)->update(["login_tokens"=>$resp["login_tokens"]] );
            
            // mencari data regional berdasarkan regional_id
            $regional = $this->db->table("regionals")->where(["id"=>$resp["regional_id"]])->get()->getRow();

            // menambahkan array regional ke dalam array respon
            $resp["regional"] = $regional;

            // hapus array yang tidak dibutuhkan
            unset($resp["regional_id"]);
            return $this->respond($resp,200);

        }else{
            return $this->respond(["message"=>"ID Card Number or Password incorrect"],401);
        }
        
    }
    public function logout(){
        $token = $this->request->getGet("token");
        // mengecek apakah token ditemukan
        $data = $this->db->table("societies")->where(["login_tokens"=>$token])
                ->get()->getNumRows();
        // jika token ditemukan maka logout sukses        
        if($data > 0){
            $resp["message"] = "Logout success";
            return $this->respond($resp, 200);
        }else{
            return $this->respond(["message"=>"Unauthorized user"],401);

        }

    }
 
}
