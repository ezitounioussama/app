<?php
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
                $objUser->redirect('user.php?updated#user');
            }
        } else {
            if ($objUser->insert($name, $pass, $function, $id)) {
                $objUser->redirect('user.php?inserted#user');
            } else {
                $objUser->redirect('user.php?error#user');
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="modal_assets/css/styles.css">


    <title>Edit</title>
</head>

<body>
    <section class="modal container">
        <button class="modal__button" id="open-modal">
            Open To Edit
        </button>

        <div class="modal__container" id="modal-container">
            <div class="modal__content">
                <div class="modal__close close-modal" title="Close">
                    <i class='bx bx-x'></i>
                </div>
                <h1 class="modal__title">Edit Users</h1>

                <div class="form-container">

                    <form method="post">
                        <div class="form-group">
                            <label for="id">ID</label>
                            <input class="form-control" type="text" name="id" id="id" value="<?php print($rowUser['id']); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input class="form-control" type="text" name="name" id="name" value="<?php print($rowUser['name']); ?>" required maxlength="100">
                        </div>
                        <div class="form-group">
                            <label for="pass">Password *</label>
                            <input class="form-control" type="text" name="pass" id="pass" value="<?php print($rowUser['pass']); ?>" required maxlength="100">
                        </div>
                        <div class="form-group">
                            <label for="function">Function *</label>
                            <input class="form-control" type="text" name="function" id="function" value="<?php print($rowUser['function']); ?>" required maxlength="100">
                        </div>
                        <input class="modal__button modal__button-width" type="submit" name="btn_save" value="Save">
                </div>
                </form>



                <button class="modal__button-link close-modal">
                    Close
                </button>
            </div>
        </div>
    </section>

    <!--=============== MAIN JS ===============-->
    <script src="modal_assets/js/main.js"></script>
</body>

</html>