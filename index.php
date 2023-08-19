<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<html>
    
<head>
	<title>eternaments.com</title>
    <script defer src="app.js"></script>
</head>
<?php include_once 'pages/header.php'?>
<body>










<div id="parallax"></div>

<script>
    
    const bg = document.getElementById('parallax');
    window.addEventListener('scroll', function(){
        bg.style.backgroundSize = 90 + +window.pageYOffset/100+"vw";
       
    })
    

</script>
<!---
<form class="secretForm" autocapitalize="off" autocomplete="off">
    <input type="text" id="secretInput" name="si">
</form>

<script type="text/javascript">
    document.querySelector(".secretForm")?.addEventListener('submit', e => {
        e.preventDefault();
        if (e.currentTarget.si.value == "589xBNQ"){
            document.location.pathname = "eternaments-website/pages/secret.html"
        }
    })
</script>
--->
<div id="aboutUs">
    
    <h1 id="title" class="hidden" style="padding-bottom: 50px;">Who are we?</h1>
    <div id="content">
        <p class="hidden" style="height: fit-content; width:fit-content;">Welcome to Eternaments, the premier online tournament hosting platform for gamers around the world! We are a company that is dedicated to providing high-quality and engaging gaming experiences for our community.</p>
        <div id="firstImage" class="imgHolder">
            <p class="hidden flexItems" style="height: fit-content; text-align: left; width: 50%;">At Eternaments, we believe that gaming is more than just a hobby - it’s a way of life. We understand that the gaming community is a passionate and dedicated group of individuals who are always looking for new challenges and opportunities to showcase their skills.</p>
            <div style="width: 50%;" class="flexItems">
                <div id="firstImageimg" class="hidden flexItems"></div>
                
            </div>
            
        </div>
        <br>
        <div id="secondImage" class="imgHolder">
            <div style="width: 50%;" class="flexItems">
                <div id="secondImageimg" class="hidden flexItems"></div>
                
            </div>
            <p class="hidden flexItems" style="height: fit-content; text-align: right; width: 50%;">That’s why we have created a platform that is designed to cater to the needs of gamers of all skill levels. Whether you are a casual player or a professional gamer, we have tournaments that are tailored to meet your needs. We host a wide range of tournaments for popular games such as Valorant, Overwatch, CSGO, and many more. Each tournament comes with exciting prizes for the winners, giving you the motivation to put your best foot forward.</p>
           
            
        </div>
        <br>
        <div id="thirdImage" class="imgHolder">
            
            <p class="hidden flexItems" style="height: fit-content; text-align: left; width: 50%;">At Eternaments, we take pride in the quality of our tournaments. We work tirelessly to ensure that each event is well-organized, fair, and enjoyable for everyone involved. Our team of experienced tournament organizers is always on hand to answer any questions you may have and provide you with the support you need to succeed.
            </p>
            <div style="width: 50%;" class="flexItems">
                <div id="thirdImageimg" class="hidden flexItems"></div>
                
            </div>
            
        </div>
        <br>
        <div id="fourthImage"  class="imgHolder">
            <div style="width: 50%;" class="flexItems">
                <div id="fourthImageimg" class="hidden"></div>
                
            </div>
            <p class="hidden flexItems" style="height: fit-content; text-align: right; width: 50%;">We are passionate about gaming, and we are committed to fostering a community that is inclusive, welcoming, and supportive. We believe that gaming is a powerful tool that can bring people together and create meaningful connections.
            </p>
            
            
        </div>
        <br>

        <p class="hidden" style="height: fit-content; width:fit-content;">So, whether you’re a seasoned gamer or a newbie just starting out, we invite you to join us at Eternaments and experience the thrill of competitive gaming. Let’s build a community that is united by our love of gaming and our passion for competition.</p>
        <br>
        <a id="invite" href="https://discord.gg/eternaments" target="_blank">Jump In</a>
    </div>
    
    
   
</div>

</body>
</html>
