<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Consultations extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $token = $this->request->getGet("token");
        $post = $this->request->getPost();
        // mengecek apakah token ditemukan
        $data = $this->db->table("societies")->where(["login_tokens"=>$token])
                ->get()->getNumRows();
        // jika token ditemukan maka melakukan proses insert        
        if($data > 0){

            $resp["message"] = "Logout success";
            return $this->respond($resp, 200);

        }else{
            return $this->respond(["message"=>"Unauthorized user"],401);

        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
