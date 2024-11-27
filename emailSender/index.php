<?php

include './sendMail.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $post = $_POST['post'];
    $status = $_POST['exampleGroup'];

    // echo $status;
    // exit;
    $msg = sendPdf($name, $email, $post, $status);
    // echo $msg;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="container max-w-lg mx-auto bg-white shadow-md rounded-lg p-6">
        <?php if (isset($msg)) { ?>
            <div id="message" class="text-green-600 mb-4">
                <?php if (isset($msg)) {
                    echo $msg;
                } ?>
            </div>
        <?php } ?>

        <form method="post" class="space-y-6">
            <div>
                <label for="candidateName" class="block text-gray-700 font-medium">Enter Candidate Name</label>
                <input type="text" name="name" id="candidateName" placeholder="Enter name"
                    class="w-full mt-2 p-2 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none">
                <small class="text-gray-500">We'll never share your email with anyone else.</small>
            </div>
            <div>
                <label for="email" class="block text-gray-700 font-medium">Email address</label>
                <input type="email" name="email" id="email" placeholder="Enter email"
                    class="w-full mt-2 p-2 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none">
                <small class="text-gray-500">We'll never share your email with anyone else.</small>
            </div>
            <div>
                <label for="post" class="block text-gray-700 font-medium">Post</label>
                <input type="text" name="post" id="post" placeholder="Enter applied post"
                    class="w-full mt-2 p-2 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none">
            </div>

            <div class="space-y-2">
                <label class="block text-gray-700 font-medium">Selection Status</label>
                <div class="flex items-center">
                    <input type="radio" name="exampleGroup" id="option1" value="Selected"
                        class="w-4 h-4 text-blue-600 focus:ring-blue-500 focus:ring-2">
                    <label for="option1" class="ml-2 text-gray-700">Selected</label>
                </div>
                <div class="flex items-center">
                    <input type="radio" name="exampleGroup" id="option2" value="UnSelected"
                        class="w-4 h-4 text-blue-600 focus:ring-blue-500 focus:ring-2">
                    <label for="option2" class="ml-2 text-gray-700">UnSelected</label>
                </div>
            </div>

            <button type="submit" name="submit"
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:ring focus:ring-blue-300 focus:outline-none">
                Submit
            </button>
        </form>
    </div>
</body>
</html>
