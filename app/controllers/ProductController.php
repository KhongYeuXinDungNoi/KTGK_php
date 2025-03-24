    <?php

        require_once(BASE_PATH . '/app/config/database.php');
        require_once(BASE_PATH . '/app/models/ProductModel.php');
        require_once(BASE_PATH . '/app/models/CategoryModel.php');

        class ProductController
        {
            private $productModel;
            private $db;

            public function __construct()
            {
                $this->db=(new Database())->getConnection();
                $this->productModel = new ProductModel($this->db);
            }

            public function index()
            {
                $products = $this->productModel->getProducts();
                include BASE_PATH . '/app/views/product/list.php';
            }

            public function show($id)
            {
                $product = $this->productModel->getProductById($id);
                if ($product) {
                    include 'app/views/product/show.php';
                }else{
                    echo "Không tìm thấy sản phẩm";
                }
            }

            public function add()
            {
                $categories = (new CategoryModel($this->db))->getCategories();
                include_once BASE_PATH . '/app/views/product/add.php';
            }


            public function edit($id)
            {
                $product = $this->productModel->getProductById($id);
                $categories = (new CategoryModel($this->db))->getCategories();
            
                if ($product) {
                    include BASE_PATH . '/app/views/product/edit.php';
                } else {
                    echo "Không thấy sản phẩm.";
                }
            }
            
            public function update()
            {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $category_id = $_POST['category_id'];
                
                    $edit = $this->productModel->updateProduct($id, $name, $description, $price, $category_id);
                
                    if ($edit) {
                        header('Location: /public/index.php?controller=Product&action=index');
                    } else {
                        echo "Đã xảy ra lỗi khi lưu sản phẩm.";
                    }
                }
            }


            public function delete($id)
            {
                if ($this->productModel->deleteProduct($id)) {
                    header('Location: /public/index.php?controller=Product&action=index');
                } else {
                    echo "Đã có lỗi xảy ra khi xóa sản phẩm";
                }
                
            }
        }
    ?>