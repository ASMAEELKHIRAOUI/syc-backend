<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    if(isset($_GET['deleteid']))     deleteTask();
    
    function getTasks($a){
        //CODE HERE
        $connect = connection();
        $sql= "SELECT * FROM tasks WHERE status=$a";
        $result=mysqli_query($connect,$sql);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $title = $row['title'];
                $type = $row['type'];
                $status = $row['status'];
                $priority = $row['priority'];
                $date = $row['date_time'];
                $description = $row['description'];
                if($status==1){
                    echo '<button class="d-flex p-2 border-0">
                    <div class="d-grid">
                        <i class="fa-regular fa-circle-question text-success ms-2 mt-2 fs-4"></i>
                        <a href="scripts.php?deleteid='.$id.'"><i class="fa-solid fa-trash-can text-danger ms-2 mt-3 fs-4"></i></a>
                        <a href="update.php?id='.$id.'"><i class="fa-solid fa-pen-to-square text-warning ms-2 mt-2 fs-4"></i></a>
                    </div>
                    <div class="text-start ms-2 mt-1">
                        <div class="fw-bold text-dark ">'.$title.'</div>
                        <div class="">
                            <div class="text-secondary">#'.$id.' created in '.$date.'</div>
                            <div class=""
                                title="'.$description.'">'.$description.'</div>
                        </div>
                        <div class="">
                            <span class="btn btn-primary btn-sm">'.$priority.'</span>
                            <span class="btn bg-light-600 btn-sm">'.$type.'</span>
                        </div>
                    </div>
                </button>';
                }
                if($status==2){
                    echo '<button class="d-flex p-2 border-0">
                    <div class="d-grid">
                        <i class="fa fa-circle-notch fa-rotate-90 text-success ms-2 mt-2 fs-4"></i>
                        <a href="scripts.php?deleteid='.$id.'"><i class="fa-solid fa-trash-can text-danger ms-2 mt-3 fs-4"></i></a>
                        <a href="update.php?id='.$id.'"><i class="fa-solid fa-pen-to-square text-warning ms-2 mt-2 fs-4"></i></a>
                    </div>
                    <div class="text-start ms-2 mt-1">
                        <div class="fw-bold text-dark ">'.$title.'</div>
                        <div class="">
                            <div class="text-secondary">#'.$id.' created in '.$date.'</div>
                            <div class=""
                                title="'.$description.'">'.$description.'</div>
                        </div>
                        <div class="">
                            <span class="btn btn-primary btn-sm">'.$priority.'</span>
                            <span class="btn bg-light-600 btn-sm">'.$type.'</span>
                        </div>
                    </div>
                </button>';
                }
                if($status==3){
                    echo '<button class="d-flex p-2 border-0">
                    <div class="d-grid">
                        <i class="fa-regular fa-circle-check text-success ms-2 mt-2 fs-4"></i>
                        <a href="scripts.php?deleteid='.$id.'"><i class="fa-solid fa-trash-can text-danger ms-2 mt-3 fs-4"></i></a>
                        <a href="update.php?id='.$id.'"><i class="fa-solid fa-pen-to-square text-warning ms-2 mt-2 fs-4"></i></a>
                    </div>
                    <div class="text-start ms-2 mt-1">
                        <div class="fw-bold text-dark ">'.$title.'</div>
                        <div class="">
                            <div class="text-secondary">#'.$id.' created in '.$date.'</div>
                            <div class=""
                                title="'.$description.'">'.$description.'</div>
                        </div>
                        <div class="">
                            <span class="btn btn-primary btn-sm">'.$priority.'</span>
                            <span class="btn bg-light-600 btn-sm">'.$type.'</span>
                        </div>
                    </div>
                </button>';
                }

            }
        }
        return $row;
        echo "Fetch all tasks";
    }

    function saveTask()
    {
        //CODE HERE
        $connect = connection();
        $id = $_POST['id'];
        $title = $_POST['title'];
        $type = $_POST['type'];
        $status = $_POST['status'];
        $priority = $_POST['priority'];
        $date = $_POST['date_time'];
        $description = $_POST['description'];
        //SQL SELECT
        $sql = "INSERT INTO tasks VALUES (null, '$title','$type','$status','$priority','$date','$description')";
        $result=mysqli_query($connect,$sql);
        //SQL INSERT
        $_SESSION['message'] = "Task has been added successfully !";
		header('location: index.php');
    }

    function updateTask()
    {
        $connect = connection();
        $id = $_POST['id'];
        $title = $_POST['title'];
        $type = $_POST['type'];
        $status = $_POST['status'];
        $priority = $_POST['priority'];
        $date = $_POST['date_time'];
        $description = $_POST['description'];
        $sql = "UPDATE tasks SET title='$title',type='$type',status='$status',priority='$priority',date_time='$date',description='$description' WHERE id=$id";

        $result=mysqli_query($connect,$sql);
        $_SESSION['message'] = "data mcha o jat!";
        header('location: index.php');
    }

    function deleteTask()
    {
        //CODE HERE
        $connect=connection();
        $id=$_GET['deleteid'];
        //SQL DELETE
        $sql="DELETE FROM tasks WHERE id=$id";
        $result=mysqli_query($connect,$sql);
        $_SESSION['message'] = "Task has been deleted successfully !";
		header('location: index.php');
    }
?>