<?php
include 'scripts.php';
$connect = connection();
$id = $_GET['id'];
$sql = "SELECT * FROM tasks WHERE id=$id";
$result=mysqli_query($connect,$sql);
if($result)
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Edit Task</title>
</head>
<body>
<div id="content" class="app-content" style="min-height: 100vh; background: url(assets/img/cover/cover-scrum-board.png) no-repeat fixed; background-size: 360px; background-position: right bottom;">    
<div class="container">
        <div class="">
            <div class="">
                <form action="update.php" method="POST" id="form-task">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Task</h5>
                        <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                    </div>
                    <div class="modal-body">
                            <!-- This Input Allows Storing Task Index  -->
                            <input type="hidden" id="task-id" name = "id"  value="<?php echo $row['id']; ?>">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" id="task-title" name ="title" value="<?php echo $row['title']; ?>"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Type</label>
                                <?php $type= $row['type']; ?> 
                                <div class="ms-3">
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" name="type" type="radio" value="Feature" <?php echo ($type== '1') ?  "checked" : "" ;  ?> id="task-type-feature"/>
                                        <label class="form-check-label" for="task-type-feature">Feature</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="type" type="radio" value="Bug" <?php echo ($type== '2') ?  "checked" : "" ;  ?> id="task-type-bug"/>
                                        <label class="form-check-label" for="task-type-bug">Bug</label>
                                    </div>
                                </div>
                            
                            </div>
                            <div class="mb-3">
                            <div><label class="form-label">Priority</label name priority></div>
                            <div><select class="form-select" id="task-priority" name="priority">
                                    <option value="">Please select</option>
                                    <option value="Low" <?php if($row['priority']=='1'){ echo ' selected'; }?>>Low</option>
                                    <option value="Medium" <?php if($row['priority']=='2'){ echo ' selected'; }?>>Medium</option>
                                    <option value="High" <?php if($row['priority']=='3'){ echo ' selected'; }?>>High</option>
                                    <option value="Critical" <?php if($row['priority']=='4'){ echo ' selected'; }?>>Critical</option>
                                </select></div>
                            </div>
                            <div class="mb-3">
                            <div><label class="form-label">Status</label></div>
                            <div><select class="form-select" id="task-status" name="status">
                                    <option value="">Please select</option>
                                    <option value="1" <?php if($row['status']==1){ echo ' selected'; }?>>To Do</option>
                                    <option value="2" <?php if($row['status']==2){ echo ' selected'; }?>>In Progress</option>
                                    <option value="3" <?php if($row['status']==3){ echo ' selected'; }?>>Done</option>
                                </select></div> 
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" id="task-date" name ="date_time" value="<?php echo $row['date_time'] ?>"/>
                            </div>
                            <div class="mb-0">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" rows="10" id="task-description" name="description"><?php echo $row['description'] ?></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</a>
                        <button type="submit" name="update" class="btn btn-warning task-action-btn" id="task-update-btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div></div>
</body>
</html>