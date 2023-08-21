
<html>
   
    <meta name="viewport" content="width=device-width, initial-scale=1 minimum-scale=1" />
    <script src="jquery-3.6.4.min.js"></script>
    <body>
        <link rel="stylesheet" href="maint.css">
        <div id="text" class="scrollable">Sorry, but our site is currently under maintenance. Please enjoy some music while you wait. It's sure to be excellent.</div>
        <div id="vidContainer" class="scrollable">
            <iframe id="video" src="https://www.youtube.com/embed/leEQ3nz8O-I?autoplay=1&enablejsapi=1" frameborder="0" allow='autoplay' allowfullscreen></iframe>
                <script>
                    var tag = document.createElement('script');

                    tag.src = "https://www.youtube.com/iframe_api";
                    var firstScriptTag = document.getElementsByTagName('script')[0];
                    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                    //Holds a reference to the YouTube player
                    var player;

                    //this function is called by the API
                    function onYouTubeIframeAPIReady() {
                        //creates the player object
                        player = new YT.Player('player');
                    
                        //subscribe to events
                        player.addEventListener("onReady",       "onYouTubePlayerReady");
                        player.addEventListener("onStateChange", "onYouTubePlayerStateChange");
                    }

                    function onYouTubePlayerReady(event) {
                        event.target.playVideo();
                    }
                    
                    function onYouTubePlayerStateChange(event) {
                        if (event.data == YT.PlayerState.PLAYING) {
                            $('.scrollable').addClass("scroll");
                        }
                    }
                </script>
        </div>
       
        <div id="text2">Thanks, 
The Eternaments Team
        </div>
        <div id="imgHolder" style="display: flex; justify-content: center; align-items: center;">
            <img id ="img"src="img/Untitled_design_6.png" alt="">
        </div>
        
    </body>
</html>

