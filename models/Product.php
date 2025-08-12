<?php
class Product extends BaseModel
{
    protected $table = 'products';

    /**
     * Lấy tất cả sản phẩm cùng với tên danh mục tương ứng.
     */
    public function selectAllWithCategoryName()
    {
        try {
            $sql = "
                SELECT 
                    p.*, 
                    c.category_name 
                FROM 
                    {$this->table} AS p
                INNER JOIN 
                    categories AS c ON p.category_id = c.category_id
                ORDER BY 
                    p.product_id ASC
            ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            // Ghi lại lỗi hoặc xử lý một cách phù hợp
            // Ví dụ: error_log($e->getMessage());
            return [];
        }
    }

    /**
     * Tìm một sản phẩm theo ID cùng với tên danh mục.
     * @param int $id ID của sản phẩm
     */
    public function findWithCategoryName($id)
    {
        try {
            $sql = "
                SELECT 
                    p.*, 
                    c.category_name 
                FROM 
                    {$this->table} AS p
                INNER JOIN 
                    categories AS c ON p.category_id = c.category_id
                WHERE 
                    p.product_id = :id
            ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Lấy danh sách các sản phẩm nổi bật (mới nhất).
     * @param int $limit Số lượng sản phẩm muốn lấy.
     * @return array
     */
    public function getTopSellingProducts($limit = 3)
    {
        // Sử dụng phương thức select() đã được nâng cấp từ BaseModel
        // để lấy các sản phẩm mới nhất một cách đơn giản.
        return $this->select(
            orderBy: 'product_id DESC',
            limit: $limit
        );
    }
}
