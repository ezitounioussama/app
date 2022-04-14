<?php
require_once '../session.php';
// Show PHP errors
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

require_once 'classes/user.php';

$objUser = new User();
// GET
if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    $stmt = $objUser->runQuery("SELECT * FROM login WHERE id=:id");
    $stmt->execute(array(":id" => $id));
    $rowUser = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    $id = null;
    $rowUser = null;
}

// POST
if (isset($_POST['btn_save'])) {
    $name   = strip_tags($_POST['name']);
    $pass  = strip_tags($_POST['pass']);
    $function  = strip_tags($_POST['function']);

    try {
        if ($id != null) {
            if ($objUser->update($name, $pass, $function, $id)) {
                $objUser->redirect('admin_interface.php?updated#user');
            }
        } else {
            if ($objUser->insert($name, $pass, $function, $id)) {
                $objUser->redirect('admin_interface.php?inserted#user');
            } else {
                $objUser->redirect('admin_interface.php?error#user');
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>
<?php
// Show PHP errors
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

require_once 'classes/user.php';

$objUser = new User();

// GET
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    try {
        if ($id != null) {
            if ($objUser->delete($id)) {
                $objUser->redirect('user.php?deleted');
            }
        } else {
            var_dump($id);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>

<?php
$title = 'User';
require_once 'includes/header.php';
?>
<?php
require_once 'includes/navbar.php';
?>
<section class="home" id="user">
    <div class="text">
        User
    </div>
    <div class="flex flex-col justify-center items-center">

        <?php
        if (isset($_GET['updated'])) {
            echo '<div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                        <strong>User!</Strong>&nbsp;&nbsp; Updated with success.
                        </div>';
        } else if (isset($_GET['deleted'])) {
            echo '<div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                        <strong>User!</Strong>&nbsp;&nbsp; Deleted with success.
                        </div>';
        } else if (isset($_GET['inserted'])) {
            echo '<div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                        <strong>User!</Strong>&nbsp;&nbsp; Inserted with success.
                        </div>';
        } else if (isset($_GET['error'])) {
            echo '<div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                        <strong>DB Error!</Strong>&nbsp;&nbsp; Something went wrong with your action. Try again!
                        </div>';
        }
        ?>

            <div class="relative top-9 overflow-x-auto shadow-md sm:rounded-lg w-3/4">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Password
                </th>
                <th scope="col" class="px-6 py-3">
                    Function
                </th>
                <th scope="col" class="px-6 py-3">
                <span class="sr-only"></span>
                </th>
                </tr>
                </thead>
                        <?php
                            $query = "SELECT * FROM login";
                            $stmt = $objUser->runQuery($query);
                            $stmt->execute();
                        ?>
                    <tbody>
                        <?php if ($stmt->rowCount() > 0) {
                            while ($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    <?php print($rowUser['id']); ?>
                    </th>
                    <td class="px-6 py-4">
                    <a href="modal.php?edit_id=<?php print($rowUser['id']); ?>">
                                    <?php print($rowUser['name']); ?>
                                </a>
                    </td>
                    <td class="px-6 py-4">
                    <?php print($rowUser['pass']); ?>
                    </td>
                    <td class="px-6 py-4">
                    <?php print($rowUser['function']); ?>
                    </td>
                    <td class="px-6 py-4 text-right">
                    <a href="user.php?delete_id=<?php print($rowUser['id']); ?>" class="confirmation font-medium text-blue-600 dark:text-blue-500 hover:underline"><span class="icon" data-feather="trash"></span></a>
                    </td>
                    </tr>
                    <?php }
                } ?>
                    </tbody>
            </table>
        </div>
    </div>


</section>
<script>
    // JQuery confirmation
    $('.confirmation').on('click', function() {
        return confirm('Are you sure you want do delete this user?');
    });
</script>
<?php

require_once 'includes/footer.php';


?>