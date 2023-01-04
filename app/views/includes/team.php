<style type="text/css">
  *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 20px;
}

.wrapper{
  margin-top: 50px;
  text-align: center;
  background-color: #f9f9f9;
  padding: 30px;
}

.wrapper h1{
  font-family: 'Yatra One', cursive;
  font-size: 48px;
  color: #fff;
  margin-bottom: 25px;
}

.our_team{
  width: auto;
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
}

.our_team .team_member{
  width: 250px;
  margin: 5px;
  padding: 20px 10px;
}

.our_team .team_member .member_img{
  background: #e9e5fa;  
  max-width: 190px;
  width: 100%;
  height: 190px;
  margin: 0 auto;
  border-radius: 50%;
  padding: 5px;
  position: relative;
  cursor: pointer;
}

.our_team .team_member .member_img img{
  width: 100%;
  height: 100%;
}

.our_team .team_member h3{
  text-transform: uppercase;
  font-size: 18px;
  line-height: 18px;
  letter-spacing: 2px;
  margin: 15px 0 0px;
}

.our_team .team_member span{
  font-size: 10px;
}

.our_team .team_member p{
  margin-top: 20px;
  font-size: 14px;
  line-height: 20px;
}

.our_team .team_member .member_img .social_media{
  position: absolute;
  top: 5px;
  left: 5px;
  background: rgba(0,0,0,0.65);
  width: 95%;
  height: 95%;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  transform: scale(0);
   transition: all 0.5s ease;
}

.our_team .team_member .member_img .social_media .item{
  margin: 0 10px;
}

.our_team .team_member .member_img .social_media .fab{
  color: #8c7ae6;
  font-size: 20px;
}

.our_team .team_member .member_img:hover .social_media{
  transform: scale(1);
}
</style>
<div class="wrapper">
    <h3 class="tittle">Our Team</h3>
    <p class="sub text-center">Staff Members</p>
    <div class="our_team">
      <?php 
        foreach ($data[4] as $staffs => $staff) {
          echo '
            <div class="team_member">
              <div class="card">
                  <div class="member_img">
                    <img src="'.site_url('public/images/'.$staff['photo']).'" class="rounded-circle" alt="our_team">
                  </div>
                
                  <h3>'.$staff['firstname'].' '.$staff['lastname'].'</h3>
                  <span style="font-size: 12px;">'.$staff['position'].'</span>
                  <p style="font-size: 20px;"><a href="facebook.com"><i class="fa fa-facebook-official"></i></a> <a href="twitter.com"><i class="fa fa-twitter"></i></a> <a href="gmail.com"><i class="fa fa-envelope"></i></a> <a href="twitter.com"><i class="fa fa-instagram"></i></a></p>
                  
              </div>
            </div> ';
        }
      ?>
    </div>
</div>