<?php
class Product extends Db
{
	private $_product;
	public function __construct()
	{
		parent::__construct();
		$sql = "select * from products";
		$this->_product = $this->exeQuery($sql);

	}
	public function getProduct()
	{
		return $this->_product;
	}
	public function add($arr)
	{
		$sql = "insert into products (name, category_id, image_url, description, price, quantity2) values (:name, :category_id, :image_url, :description, :price, :quantity2)";
		$this->exeNoneQuery($sql, $arr);
	}
	public function Remove($product_id)
	{
		$sql = "delete from products where product_id=:product_id ";
		$arr = array(":product_id" => $product_id);
		return $this->exeNoneQuery($sql, $arr);
	}
	public function Joincategories()
	{
		$sql = "Select products.*, categories.name as namecate from products join categories on products.category_id = categories.category_id";
		return $this->exeQuery($sql);

	}
	public function Update($arr)
	{

		$sql = "update products 
            set 
        name = :name,
        category_id = :category_id,
        description = :description,
        price = :price,
        image_url = :image_url,
        quantity2 = :quantity2
            WHERE 
        product_id = :product_id
        ";
		return $this->exeNoneQuery($sql, $arr);

	}

	public function getById($product_id)
	{
		$sql = "SELECT * FROM products WHERE product_id = :product_id";
		return $this->exeQuery($sql, ["product_id" => $product_id])[0] ?? "";
	}



	public function getAllCategories()
	{
		$sql = "SELECT category_id, name FROM categories";
		return $this->exeQuery($sql);
	}


	public function getPage($curentPage = 1, $sizePage = 5)
	{
		$offset = ($curentPage - 1) * $sizePage;

		// Truy vấn kết hợp với LEFT JOIN để tính số lượng sản phẩm
		$sql = "SELECT products.*, COUNT(categories.category_id) AS quantity 
            FROM products 
            LEFT JOIN categories ON products.product_id = categories.category_id 
            GROUP BY products.product_id 
            LIMIT $offset, $sizePage";
		return $this->exeQuery($sql);
	}

	public function getCountPage($sizePage)
	{
		$sql = "SELECT COUNT(*) AS total FROM products";
		$count = $this->queryone($sql)['total'];
		return ceil($count / $sizePage);
	}
}
?>