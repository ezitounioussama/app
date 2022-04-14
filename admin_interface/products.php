<?php
require_once '../session.php';
$title = 'Product';
require_once 'includes/header.php';
?>
<?php
require_once 'includes/navbar.php';
?>

<?php

if (isset($_POST['submit'])) {
    // Create database connection
    $db = mysqli_connect("localhost", "root", "", "webapp");

    // Initialize message variable
    $msg = "";

    // If submit button is clicked ...

    // Get image name
    $image = $_FILES['image']['name'];
    // Get text
    $desc = mysqli_real_escape_string($db, $_POST['description']);
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $cat = $_POST['category'];
    $qte = $_POST['qte'];

    // image file directory
    $target = "images/".basename($image);

    $sql = "INSERT INTO products (product_name,images,description, product_cat, price,qte) VALUES ('$name','$image','$desc','$cat','$price','$qte')";
    mysqli_query($db, $sql);
    // execute query






    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    } else {
        $msg = "Failed to upload image";
    }

    echo '<script type="text/javascript">
    $(document).ready(function() {
        swal({
            title: "You added a new phone",
            text: "Great!",
            icon: "success",
            button: "Ok",
            timer: 5000
        });
    });
</script>';
}
?>

<section class="home" id="dashbord">


    <div class="flex flex-col justify-evenly  m-10">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 text">Product</h3>
                    <p class="mt-1 text-sm text-gray-600">here you can enter your new products
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="company_website" class="block text-sm font-medium text-gray-700">
                                        Product
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                            Name
                                        </span>
                                        <input type="text" name="product_name" id="company_website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Iphone 7/ Samsung S7 ... ">
                                    </div>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                            Price &nbsp;
                                        </span>
                                        <input type="text" name="product_price" id="company_website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="$ -  ">
                                    </div>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                            Quantity &nbsp;
                                        </span>
                                        <input type="text" name="qte" id="company_website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="100.... ">
                                    </div>
                                </div>
                            </div>


                            <div>
                                <label for="about" class="block text-sm font-medium text-gray-700">
                                    Description
                                </label>
                                <div class="mt-1">
                                    <textarea id="about" name="description" rows="3" class="p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com"></textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">
                                    describe your product here
                                </p>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="Categorie" class="block text-sm font-medium text-gray-700">Category of your product</label>
                                <select id="Category" name="category" autocomplete="product_cat" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option>Apple</option>
                                    <option>Samsung</option>
                                    <option>Google</option>
                                    <option>Oppo</option>
                                    <option>Xiaomi</option>
                                </select>
                            </div>



                            <div>
                                <label class="block text-sm font-medium text-gray-700">
                                    Product Photo
                                </label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="True">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Upload a file</span>
                                                <input id="file-upload" name="image" type="file" class="sr-only" multiple>
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            PNG, JPG, GIF up to 10MB
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <input name="submit" value="submit" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>



<!-- show product -->



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
    $stmt = $objUser->runQuery("SELECT * FROM products WHERE id=:id");
    $stmt->execute(array(":id" => $id));
    $rowUser = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    $id = null;
    $rowUser = null;
}



?>
<?php


// test
class product
{
    private $conn;

    // Constructor
    public function __construct()
    {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }


    // Execute queries SQL
    public function runQuery($sql)
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }
    public function delete($id)
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM products WHERE id = :id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // Redirect URL method
    public function redirect($url)
    {
        header("Location: $url");
    }
}



// Show PHP errors
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);



$objUser = new product();

// GET
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    try {
        if ($id != null) {
            if ($objUser->delete($id)) {
                $objUser->redirect('products.php?deleted');
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

    <div class="flex flex-col justify-center items-center">


            <div class="relative mb-10 top-9 overflow-x-auto shadow-md sm:rounded-lg w-3/4">
            <table class="w-full  text-sm text-left text-gray-500 dark:text-gray-400 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Product
                </th>

                <th scope="col" class="px-6 py-3">
                    Quantite
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                <span class="sr-only"></span>
                </th>
                </tr>
                </thead>
                        <?php
                            $query = "SELECT * FROM products";
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
                                    <?php print($rowUser['product_name']); ?>
                                </a>
                    </td>

                    <td class="px-6 py-4">
                    <?php print($rowUser['qte']); ?>
                    </td>
                    <td class="px-6 py-4">
                    <?php print($rowUser['product_cat']); ?>
                    </td>
                    <td class="px-6 py-4">
                    <?php print($rowUser['price'].' $'); ?>
                    </td>
                    <td class="px-6 py-4 text-right">
                    <a href="products.php?delete_id=<?php print($rowUser['id']); ?>" class="confirmation font-medium text-blue-600 dark:text-blue-500 hover:underline"><span class="icon" data-feather="trash"></span></a>
                    </td>
                    </tr>
                    <?php
                            }
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




</section>

<?php

require_once 'includes/footer.php';
?>
