<?php include("Includes/main_header.php"); ?>
<?php include("Includes/session_data.php"); ?>
<?php include("Includes/bars.php"); ?>

<!-- Matthew Bibaoco - 10/15/2025 !-->
<div class="d-flex justify-content-center align-items-center vh-100 projects">
    <div class="bg-light rounded shadow w-75 h-75">
        <?php
            include 'calendar_task.php';
            include 'Includes/mysql_connect.php'; // make sure the path is correct

            $project_id = $_GET['project_id'];

            // Create calendar object
            $calendar = new Calendar();

            // Fetch all tasks belonging to this project
            $query = "
                SELECT task_name, due_date, task_status, category
                FROM tasks
                WHERE project_id = '$project_id'
            ";
            $result = mysqli_query($conn, $query);

            // Add each task as an event
            while ($task = mysqli_fetch_assoc($result)) {
                $title = $task['task_name'];
                $date = $task['due_date'];
                $status = strtolower($task['task_status']);
                $color = 'gray'; // default color

                // Optional: set color by status or category
                switch ($status) {
                    case 'completed': $color = 'green'; break;
                    case 'for review': $color = 'orange'; break;
                    case 'incomplete': $color = 'red'; break;
                    case 'on hold': $color = 'purple'; break;
                    default: $color = 'blue'; break;
                }

                // Add the event to the calendar
                $calendar->add_event($title, $date, 1, $color);
            }
            ?>

        <!-- Project Table -->
        <div class="row justify-content-center mt-3">
            <div id="calendar-container">
                <?php echo $calendar; ?>
            </div>
        </div>
    </div>
</div>
<?php include("Includes/main_footer.php"); ?>