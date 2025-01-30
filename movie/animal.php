<?php
session_start();
include('../db/db.php');

// Redirect to index if the user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location:index,php");
    exit();
}

// Handle Rating Submission
if (isset($_POST['submit_rating'])) {
    $user_id = $_SESSION['user_id'];
    $rating = intval($_POST['rating']); // Get the rating (1-5)

    // Check if the user has already rated the page
    $rating_check_sql = "SELECT * FROM ratings WHERE user_id = '$user_id' AND page_id = 1";
    $rating_check_result = $conn->query($rating_check_sql);

    if ($rating_check_result->num_rows > 0) {
        echo "<script>alert('You have already rated this page!');</script>";
    } else {
        // Insert the rating into the ratings table
        $rating_sql = "INSERT INTO ratings (user_id, page_id, rating) VALUES ('$user_id', 1, '$rating')";
        if ($conn->query($rating_sql) === TRUE) {
            echo "<script>alert('Rating submitted successfully!');</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }
}


// Handle Comment Submission
if (isset($_POST['submit_comment'])) {
    $user_id = $_SESSION['user_id'];
    $comment = $_POST['comment'];

    // Insert the comment into the comments table
    $comment_sql = "INSERT INTO comments (user_id, comment, page_id) VALUES ('$user_id', '$comment', 1)";
    if ($conn->query($comment_sql) === TRUE) {
        // Redirect to prevent duplicate submission on refresh
        header("Location: animal.php");
        exit();
    } else {
        echo "<p>Error: " . $conn->error . "</p>";
    }
}


// Handle Comment Deletion
if (isset($_POST['delete_comment'])) {
    $comment_id = intval($_POST['comment_id']);
    $user_id = $_SESSION['user_id'];

    // Verify that the comment belongs to the logged-in user
    $delete_check_sql = "SELECT id FROM comments WHERE id = '$comment_id' AND user_id = '$user_id'";
    $delete_check_result = $conn->query($delete_check_sql);

    if ($delete_check_result->num_rows > 0) {
        // Delete the comment
        $delete_sql = "DELETE FROM comments WHERE id = '$comment_id'";
        if ($conn->query($delete_sql) === TRUE) {
            echo "<script>alert('Comment deleted successfully!'); window.location.href='animal.php';</script>";
        } else {
            echo "<script>alert('Error: Unable to delete comment!');</script>";
        }
    } else {
        echo "<script>alert('You can only delete your own comments!');</script>";
    }
}


// Fetch all comments for Page 1
$comments_sql = "SELECT comments.id, comments.comment, comments.timestamp, users.username, comments.user_id 
                 FROM comments 
                 INNER JOIN users ON comments.user_id = users.id 
                 WHERE comments.page_id = 1 
                 ORDER BY comments.timestamp DESC";
$comments_result = $conn->query($comments_sql);

// Calculate the average rating
$avg_rating_sql = "SELECT AVG(rating) AS avg_rating FROM ratings WHERE page_id = 1";
$avg_rating_result = $conn->query($avg_rating_sql);
$avg_rating = $avg_rating_result->fetch_assoc()['avg_rating'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/movie.css">
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css" />
</head>
<body>
    <div class="main">
       <div class="page1">
        <div class="nav"> 
            <h3>start-x</h3>
            <div class="nav-part1">
            <h3>hi, <?php echo $_SESSION['username']; ?></h3>
                <h3><a href="../home page 2/temp.php">home</a></h3>
                <h3><a href="../index.php?logout=true">Logout</a></h3>
            </div>
        </div>
            <div class="page1-part1">
                <div class="part11">
                    <img src="../img/animal.jpg" alt="animal">
                </div>
                <div class="part12">
                    <h3>Animal</h3>
                    <p> A
                        01/12/2023 (IN)
                        Action, Crime, Drama
                        3h 21m</p>
                    <h3>Over View</h3>
                    <p>The hardened son of a powerful industrialist returns home after years abroad and vows to take bloody revenge on those threatening his father's life.</p>
                    <h3>Director</h3>
                    <p>Sandeep Reddy Vanga</p>
                    <h3>Writer</h3>
                    <p>Sandeep Reddy Vanga</p>
                    <h3> Cast</h3>
                    <p>Anil Kapoor,Bobby Deol, Ranbir Kapoor</p>

                </div>
            </div>
            <div class="page1-part2">
                <h1>Cast</h1>
                <div class="part2">

                    <div class="box">
                        <div class="box2">
                            <img src="https://m.media-amazon.com/images/M/MV5BMTk2ODU5Mjk2MV5BMl5BanBnXkFtZTcwODEzNDg3OA@@._V1_QL75_UX280_CR0,24,280,280_.jpg" alt="">
                        </div>
                        <h3>ranbir kapur</h3>
                    </div>
                    <div class="box">
                        <div class="box2">
                            <img src="https://m.media-amazon.com/images/M/MV5BYWI0MDBiN2ItNGY2NC00OTlmLTliYmItZjIzMDNiMWFjZTAwXkEyXkFqcGc@._V1_QL75_UX280_CR0,24,280,280_.jpg" alt="">
                        </div>
                        <h3>Anil Kapoor</h3>
                        
                    </div>
                    <div class="box">
                        <div class="box2">
                            <img src="https://m.media-amazon.com/images/M/MV5BODA2ODQ5ODI3Nl5BMl5BanBnXkFtZTgwMDYwMDMzOTE@._V1_QL75_UX280_CR0,0,280,280_.jpg" alt="">
                        </div>
                        <h3>Bobby Deol</h3>
                    </div>
                    <div class="box">
                        <div class="box2">
                            <img src="https://m.media-amazon.com/images/M/MV5BMzNlMTI2YjgtY2ZlOC00NzMwLTlhYWQtNTBjNjRkNjAzYmZmXkEyXkFqcGc@._V1_QL75_UX280_CR0,24,280,280_.jpg" alt="">
                        </div>
                        <h3>Rashmika Mandanna</h3>
                    </div>
                    <div class="box">
                        <div class="box2">
                            <img src="https://m.media-amazon.com/images/M/MV5BYWE3NTEwNGUtNTE3Yy00MmQ3LTkzMGUtN2QyZjY1YWFkOWY3XkEyXkFqcGc@._V1_QL75_UX280_CR0,0,280,280_.jpg" alt="">
                        </div>
                        <h3>Tripti Dimri</h3>
                    </div>
                    <div class="box">
                        <div class="box2">
                            <img src="https://m.media-amazon.com/images/M/MV5BZDc2YzQzY2YtZGRjMi00NzA0LWIwMTAtNjU1ZjgxYTcxYTJiXkEyXkFqcGc@._V1_QL75_UX280_CR0,0,280,280_.jpg" alt="">
                        </div>
                        <h3>Prithviraj</h3>
                    </div>
                </div>
            </div>
                <div class="page1-part3">
                <h1>animal review</h1>
                <div class="part3">
                    <p>In *Animal*, writer-director Sandeep Reddy Vanga presents a story of family, vengeance, and toxic masculinity, centered around Vijay (Ranbir Kapoor), a troubled man seeking revenge after his father is shot. The film glorifies the alpha male, with themes of violence, misogyny, and dysfunctional relationships. Vijay’s reckless actions and erratic love life with Geetanjali (Rashmika Mandanna) are problematic, and while the movie’s action sequences and Ranbir’s performance are intense, the lack of purpose in the story makes it feel hollow. The father-son conflict remains unexplored, and supporting characters, including Anil Kapoor and Bobby Deol, are underutilized. Ultimately, the film leans on Ranbir's star power but fails to deliver a meaningful narrative, leaving it as all style and no substance.</p>
                </div>

            </div>
            <div class="page1-part4">
                
            <h1>comments</h1>
    
 
    <!-- Comment Form --> 
     <div class="container123">

         <div class="container">
             <h2>comments</h2>
             <form method="POST" action="animal.php">
                 <textarea placeholder="enter comment" name="comment" rows="4" cols="50" required></textarea><br><br>
                 <input type="submit" name="submit_comment" value="Submit Comment">
                </form>
            </div>
            
            <!-- Display Comments -->
           
            <div class="container2">
                
                <?php
    if ($comments_result->num_rows > 0) {
        while($row = $comments_result->fetch_assoc()) {
            echo "<div class='xyz'><h3>" . htmlspecialchars($row['username']) . "</h3><br>";
            echo nl2br(htmlspecialchars($row['comment'])) . "<br>";
            
            // Show delete button if the comment belongs to the logged-in user
            if ($row['user_id'] == $_SESSION['user_id']) {
                echo " <form method='POST' action='animal.php' >
                <input type='hidden' name='comment_id' value='" . $row['id'] . "'>
                <button   type='submit' name='delete_comment'>Delete</button>
                </form>";
            }
            
            echo "</div>";
        }
    } else {
        echo "<p>No comments yet. Be the first to comment!</p>";
    }
    ?>
    </div>
</div>
            </div>
       </div>
    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></script>
    <script src="../js/movie.js"></script>
</body>
</html>