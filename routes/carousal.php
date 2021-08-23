
   <div id="demo" class="carousel slide" data-ride="carousel">
      <div class="carousel-caption d-none d-md-block">
        <h1 style="color: white;">What would you like to eat?</h1><br>
          <h3 style="color: white;"><p>Search by recipe names</p>
          </h3>
          <br>
      
      </div>  

      <!--ID OF INPUT TAG = SEARCHITEM-->
     <ul class="carousel-indicators">
        <input type="text" id="searchItem"  class="form-control" placeholder="Search" aria-label="Search recipe..." aria-describedby="button-addon2">

        <!--BUTTON ONCLICK = SEARCHRECIPE()-->
        <button class="btn btn-success"  onclick="searchRecipe()" type="button" id="button-addon2"><i class="fa fa-search" aria-hidden="true"></i></button>
        
   </ul>

     <div class="carousel-inner">
       <div class="carousel-item active">
          <img src="./images/slide1.jpg" alt="_parent" width="120%"/>
       </div>
       <div class="carousel-item">
          <img src="./images/slide2.jpg" alt="_parent" width="120%">  
       </div>
        <div class="carousel-item">
          <img src="./images/slide3.jpg" alt="_parent" width="120%" >  
       </div>
        <div class="carousel-item">
          <img src="./images/slide4.jpg" alt="_parent" width="120%" >  
       </div>
        <div class="carousel-item">
          <img src="./images/slide5.jpg" alt="_parent" width="120%" >  
       </div>
        <div class="carousel-item">
          <img src="./images/slide6.jpg" alt="_parent" width="120%" >  
       </div>
        <div class="carousel-item">
          <img src="./images/slide7.jpg" alt="_parent" width="120%" >  
       </div>
        <div class="carousel-item">
          <img src="./images/slide8.jpg" alt="_parent" width="120%" >  
       </div>
        <div class="carousel-item">
          <img src="./images/slide9.jpg" alt="_parent" width="120%">  
       </div>
        <div class="carousel-item">
          <img src="./images/slide10.jpg" alt="_parent" width="120%">  
       </div>
     </div>

     <a class="carousel-control-prev" href="#demo" data-slide="prev">
       <span class="carousel-control-prev-icon"></span>
     </a>

     <a class="carousel-control-next" href="#demo" data-slide="next">
       <span class="carousel-control-next-icon"></span>
     </a>

   </div>
   <!--carousal ends here-->
  