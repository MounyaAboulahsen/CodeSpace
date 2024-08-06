<!DOCTYPE html>
<html lang="fr">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .forum-heading {
            font-size: 30px;
            text-align: center;
            padding-top: 20px;
            padding-bottom: 20px;
            color: #6a0dad; /* Purple color */
        }
        .comment-form {
            margin-bottom: 20px;
        }
        .comment-textarea {
            height: 150px;
            width: 100%;
            padding: 10px;
            resize: vertical;
        }
        .comment-btn {
            background-color: #6a0dad; /* Purple color */
            border: none;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
        }
        .comment-btn:hover {
            background-color: #5a0b8e; /* Darker purple for hover effect */
        }
        .comment-container {
            margin-top: 20px;
        }
        .comment {
            background-color: #fff;
            padding: 15px;
            margin-bottom: 15px;
        }
        .comment-name {
            font-weight: bold;
        }
        .reply-btn {
            color: #6a0dad; /* Purple color */
            cursor: pointer;
        }
        .reply-btn:hover {
            text-decoration: underline;
        }
        .reply-textarea {
            height: 100px;
            width: 100%;
            padding: 10px;
            resize: vertical;
        }
        .reply-btn {
            margin-top: 10px;
        }
        .reply{
            padding-left :15%;
            padding-bottom : 10px;
            padding-bottom : 10px;
        }
        .return-home-btn {
            margin-top: 20px;
            text-align: right;
        }
        .return-home-btn a {
            background-color: #c99fc1; /* Light purple */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .return-home-btn a:hover {
            background-color: #c99fc1; /* Darker shade of purple on hover */
        }
    </style>
</head>
<body>
<div class="return-home-btn">
        <a href="{{ url('/') }}" class="btn btn-primary">Retourner à la page d'accueil</a>
    </div>
</div>
<div class="container">
    <h1 class="forum-heading">Partagez vos idées !!</h1>

    <form action="{{url('add_comment')}}" method="post" class="comment-form">
        @csrf
        <textarea placeholder="Commentez ici" name="comment" class="comment-textarea"></textarea>
        <br>
        <input type="submit" class="btn btn-primary comment-btn" value="Commenter">
    </form>

    <div class="comment-container">
        <h2>Les commentaires</h2>

        @foreach($comment as $singleComment)
        <div class="comment">
            <div class="comment-name">{{$singleComment->name}}</div>
            <p>{{$singleComment->comment}}</p>
            <a href="javascript::void(0);" onclick="reply(this)" data-commentid="{{$singleComment->id}}" class="reply-btn">Répondre</a>
            @foreach($reply as $rep)
                @if($rep->comment_id==$singleComment->id)
                <div class="reply">
                    <div class="comment-name">{{$rep->name}}</div>
                    <p>{{$rep->reply}}</p>
                    <a href="javascript::void(0)" onclick="reply(this)" data-Commentid="{{$singleComment->id}}">Répondre</a>
                </div>
                @endif
            @endforeach
        </div>
        @endforeach

        <!-- Reply Form -->
        <div style="display : none;" class="replyDiv">
        <form action="{{url('add_reply')}}" method="post" class="reply-form" ">
        @csrf
            <input  id="commentId" name="commentId" value="" hidden="">
            <textarea placeholder="Répondez ici" name="reply" class="reply-textarea"></textarea>
            <br>
            <button type="submit" class="btn btn-warning reply-btn">Répondre</button>
            <a href="javascript::void(0);" onclick="reply_close(this)" class="btn btn-secondary">Fermer</a>
        </form>
        </div>
    </div>
</div>

<script type="text/javascript">
        function reply(caller)
        {

          document.getElementById('commentId').value=$(caller).attr('data-Commentid');
          $('.replyDiv').insertAfter($(caller));
          $('.replyDiv').show();
        }

        function reply_close(caller)
        {
         
          $('.replyDiv').hide();
        }

    </script>

</body>
</html>
