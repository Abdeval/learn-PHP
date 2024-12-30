<section>
    <h2>Add an Exercise</h2>
    <form action="process_exercise.php" method="POST">
        <div>
            <label for="title">Exercise Title:</label>
            <input type="text" id="title" name="title" required />
        </div>
        <div>
            <label for="author">Exercise Author:</label>
            <input type="text" id="author" name="author" required />
        </div>
        <div>
            <label for="date">Creation Date:</label>
            <input type="date" id="date" name="date" required />
        </div>
        <button type="submit">Send</button>
    </form>

    <h3>Exercise List</h3>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Creation Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'list_exercises.php'; ?>
        </tbody>
    </table>

    <script>
        // ! update an exercise
        function redirectToModify(exerciseId) {
            // Redirect to modify.php with the exercise ID in the query string
            window.location.href = `modify.php?id=${exerciseId}`;
        }
        // ! delete an exercise
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this exercise?")) {
                // Redirect to the delete.php script with the exercise ID
                window.location.href = `delete_exercise.php?id=${id}`;
            }
        }
    </script>
</section>