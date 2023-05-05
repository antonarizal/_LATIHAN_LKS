<style>
    /* @import url('https://fonts.googleapis.com/css?family=Questrial&display=swap'); */

body{
  background:#fad390;
  font-family: 'Questrial', sans-serif;
  display:flex;
  justify-content:center;
  align-items:center;
  height:100vh;
}
.calendar{
  display:inline-grid;
  justify-content:center;
  align-items:center;
  background:#fff;
  padding:20px;
  border-radius:5px;
  box-shadow:0px 40px 30px -20px rgba(0,0,0,0.3);
  
  .month{
    display:flex;
    justify-content:space-between;
    align-items:center;
    font-size:20px;
    margin-bottom:20px;
    font-weight:300;
    
    .year{
      font-weight:600;
      margin-left:10px;
    }
    
    .nav{
      display:flex;
      justify-content:center;
      align-items:center;
      text-decoration:none;
      color:#0a3d62;
      width:40px;
      height:40px;
      border-radius:40px;
      transition-duration:.2s;
      position:relative;
      
      &:hover{
        background:#eee;
      }
    }
  }
  
  .days{
    display: grid;
    justify-content:center;
    align-items:center;
    grid-template-columns: repeat(7, 1fr);
    color:#999;
    font-weight:600;
    margin-bottom:15px;
    
    span{
      width:50px;
      justify-self:center;
      align-self:center;
      text-align:center;
    }
  }
  
  .dates{
    display:grid;
    grid-template-columns: repeat(7, 1fr);
    
    button{
      cursor:pointer;
      outline:0;
      border:0;
      background:transparent;
      font-family: 'Montserrat', sans-serif;
      font-size:16px;
      justify-self:center;
      align-self:center;
      width:50px;
      height:50px;
      border-radius:50px;
      margin:2px;
      transition-duration:.2s;
      
      &.today{
        box-shadow:inset 0px 0px 0px 2px #0a3d62;
      }
      
      &:first-child{
        grid-column:3;
      }
      
      &:hover{
        background:#eee;
      }
      
      &:focus{
        background:#0a3d62;
        color:#fff;
        font-weight:600;
      }
    }
  }
}
</style>

<div class="calendar">
  <div class="month"><a href="#" class="nav"><i class="fas fa-angle-left"></i></a><div><?=date("M")?> <span class="year"><?=date("Y")?></span></div><a href="#" class="nav"><i class="fas fa-angle-right"></i></a></div>
  <div class="days">
    <span>Mon</span>
    <span>Tue</span>
    <span>Wed</span>
    <span>Thu</span>
    <span>Fri</span>
    <span>Sat</span>
    <span>Sun</span>
  </div>
  <div class="dates">
    <?php
for($i = 1 ; $i<=31 ; $i++){
  echo ' <button>';
  echo '<time>'.$i.'</time>';
  echo '</button>';

}

?>
   
  </div>
</div>