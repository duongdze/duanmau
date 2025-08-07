<?php
class Product extends BaseModel{
    protected $table = 'products';

    /**
     * Lấy tất cả sản phẩm kèm tên danh mục
     * @return array
     */
    public function selectAllWithCategoryName()
    {
        $sql = "SELECT * FROM {$this->table} AS p
            INNER JOIN 
                categories AS c ON p.category_id = c.category_id
            ORDER BY 
                p.product_id ASC
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}