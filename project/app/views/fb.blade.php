<html>

 <head>
 	<style>
 	.panelHolder
{
    border: solid 2px #545454;
    padding: 15px 5px 20px 5px;
    display: block;
    margin: 0 0 10px 0;
}
.panelHeader
{
    background-color: #3b5998;
    border-bottom: 1px solid #133783;
    color: White;
    font-size: 20px;
    font-weight: bold;
    padding-left: 5px;
    padding: 10px 5px 10px 5px;
    display: block;
    margin: 0 0 3px 0;
}

.panelHeader.golink:hover
{
    cursor:pointer;
    background-color: #5d8ccb;
}

.lblHeader
{
    display:block;
    font-size:14px;
    font-weight:bold;
    border-bottom: solid 1px black;
    padding: 5px 5px 5px 5px;
    margin-bottom: 10px;
}

.lblField
{
    display:inline-block;
    width:100px;
}
</style>

 </head> 
 


 <body>
 	<div class="panelHeader">
        Facebook Login & Graph API with Javascript SDK 55555
    </div>

    <div class="panelHolder">
        <fb:login-button show-faces="true" width="200" max-rows="1" data-auto-logout-link="true"
            data-scope="publish_actions"></fb:login-button>
 


    </div>
    <!-- <div class="panelHolder">
        <label class="lblHeader">ทดสอบ Post Status</label>
        <label class="lblField">ข้อความ:</label>
        <input type="text" id="postText" value="" />
        <input type="button" id="postBtn" value="post" />
        <input type="button" id="postDeleteBtn" value="delete post" />
        <br />
        <label class="lblField">Post id:</label>
        <input type="text" id="lastPostId" value="" readonly="readonly" />
    </div> -->
  <!--   <div class="panelHolder">
        <label class="lblHeader">ทดสอบ Comment ไปยัง Post-id: <label id='lblCmnToPostId'></label></label>
        <label class="lblField">ข้อความ:</label>
        <input type="text" id="commentText" value="" />
        <input type="button" id="commentBtn" value="comment" />
        <input type="button" id="commentUpdateBtn" value="update comment" />
        <input type="button" id="commentDeleteBtn" value="delete comment" />
        <br />
        <label class="lblField">Comment id:</label>
        <input type="text" id="lastCommentId" value="" readonly="readonly" />
    </div> -->




    <script type="text/javascript">
        var token = "";
        var userId = "";

        window.fbAsyncInit = function() {
            FB.init({
                appId: '140455693021414', //'259763817525266',
                status: true, // check login status
                cookie: true, // enable cookies to allow the server to access the session
                xfbml: true  // parse XFBML
            });
            FB.Event.subscribe('auth.authResponseChange', function(response){
                console.log(response);
                //logout-unauthen
                if (response.authResponse == null | response.status == "unknow") {
                    return;
                }
                token = response.authResponse.accessToken;
                userId = response.authResponse.userID;
                console.log("token:::" + token);
                console.log("userID::" + userId);

                if (response.status === 'connected') {
                    enableAPI();
                } else if (response.status === 'not_authorized') {
                    FB.login(function() { scope: 'publish_actions' });
                } else {
                    FB.login(function() { scope: 'publish_actions' });
                }
            });
        };

        // Load the SDK asynchronously
        (function(d) {
            var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
            if (d.getElementById(id)) { console.log(7); return; }
            js = d.createElement('script');
            js.id = id; js.async = true;
            js.src = "//connect.facebook.net/en_US/all.js";
            ref.parentNode.insertBefore(js, ref);
        } (document));

        function enableAPI() {
            console.log('Welcome!  Fetching your information.... ');
            getLoginProfile();
            // document.getElementById("postBtn").onclick = postMe;
            // document.getElementById("postDeleteBtn").onclick = deletePost;
            // document.getElementById("commentBtn").onclick = commentMe;
            // document.getElementById("commentUpdateBtn").onclick = updateCommentMe;
            // document.getElementById("commentDeleteBtn").onclick = deleteCommentMe;

        }
        var loginProfile = {};
        function getLoginProfile() {
            FB.api('/me', function(response) {
                console.log(response);
                loginProfile = response;
            });
        }
// $facebook = new Facebook(array(
//   'appId'  => 140455693021414,
//   'secret' => ecd312d3a7f36a3bf8a738d0cf6bdb9c,
//   'grant_type' => 'client_credentials'
// ));
 
// $post = $facebook->api('/' . $user['uid'] . '/notifications/', 'post',  array(
//   'access_token' =>140455693021414.'|'.ecd312d3a7f36a3bf8a738d0cf6bdb9c,
//   'href' => getBaseURL(),  //this does link to the app's root, don't think this actually works, seems to link to the app's canvas page
//   'template' => 'Max 180 characters',
//   'ref' => 'Notification sent '.$dNow->format("Y-m-d G:i:s") //this is for Facebook's insight
// ));
        // var lastPostId = "";
        // var lastCommentId = "";
        // function postMe() {
        //     console.log("-------post topic--------");
        //     var _message = document.getElementById("postText").value;
        //     FB.api('/me/feed', 'post', { message: _message, privacy: { "value": "SELF"} }, function(response) {
        //         console.log(response);
        //         lastPostId = response.id;
        //         document.getElementById("lastPostId").value = lastPostId;
        //     });
        // }
        // function deletePost() {
        //     console.log("-------delete post--------");

        //     FB.api('/' + lastPostId, 'delete', function(response) {
        //         console.log(response);
        //         lastPostId = "";
        //         document.getElementById("lastPostId").value = lastPostId;
        //     });
        // }
        // function commentMe() {
        //     console.log("-------post comment--------");
        //     var _message = document.getElementById("commentText").value;
        //     console.log("comment to post-id:" + lastPostId);
        //     FB.api('/' + lastPostId + '/comments', 'post', { message: _message }, function(response) {
        //         console.log(response);
        //         if (response && !response.error) {
        //             lastCommentId = response.id;
        //             document.getElementById("lastCommentId").value = lastCommentId;
        //             console.log("get comment id:" + lastCommentId);
        //         } else {

        //         }
        //     });
        // }
        // function updateCommentMe() {
        //     console.log("-------update comment--------");
        //     var _message = document.getElementById("commentText").value;
        //     lastCommentId = document.getElementById("lastCommentId").value;
        //     console.log("update comment:" + lastCommentId);
        //     FB.api('/' + lastCommentId, 'post', { message: _message }, function(response) {
        //         console.log(response);
        //         if (response && !response.error) {
        //             /* handle the result */
        //         } else {

        //         }
        //     });
        // }
        // function deleteCommentMe() {
        //     console.log("-------delete comment--------");
        //     var _message = document.getElementById("commentText").value;
        //     lastCommentId = document.getElementById("lastCommentId").value;
        //     console.log("delete comment:" + lastCommentId);
        //     FB.api('/' + lastCommentId, 'delete', function(response) {
        //         console.log(response);
        //         if (response && !response.error) {
        //             lastCommentId = "";
        //             document.getElementById("lastCommentId").value = lastCommentId;
        //         } else {

        //         }
        //     });
        // }
    </script>
 </body> 


</html>