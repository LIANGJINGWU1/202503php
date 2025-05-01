<?php
class PostManager {
    private $pdo;
    private $table = 'movie';
    private $fields = [];

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->fields = array_filter(//过滤
            $this->getTableFields($this->table),
            function($field) {
                return $field !== 'id'; // 忽略id字段
            }
        );
    }

    private function getTableFields($table) {
        $stmt = $this->pdo->query("DESCRIBE $table");
        return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }

    // 新增
    public function addPost($postData) {
        $placeholders = implode(',', array_fill(0, count($this->fields), '?'));
        $columns = implode(',', array_map(function($field) {
            return "`$field`";
        }, $this->fields));

        $stmt = $this->pdo->prepare("INSERT INTO {$this->table} ($columns) VALUES ($placeholders)");

        $values = [];
        foreach ($this->fields as $field) {
            if($field === 'update')
            {$values[] = $postData[$field] ?? date('Y-m-d H:i:s');}
            else if ($field === 'duration'){
                $values[] = isset($postData[$field]) && $postData[$field] !== '' ? (int)$postData[$field] : 0;
            }
            else $values[] = $postData[$field] ?? '';
        }
        return $stmt->execute($values);
    }

    // 删除
    public function deletePost($code) {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE `code` = ?");
        return $stmt->execute([$code]);
    }

    // 更新
    public function updatePost($postData, $code) {
        $setParts = [];
        $values = [];

        foreach ($this->fields as $field) {
            if (isset($postData[$field]) && $postData[$field] !== '') {
                $setParts[] = "`$field` = ?";
                $values[] = $postData[$field];
            }
        }

        if (empty($setParts)) {
            return false;
        }

        $setClause = implode(',', $setParts);
        $stmt = $this->pdo->prepare("UPDATE {$this->table} SET {$setClause} WHERE `code` = ?");
        $values[] = $code;
        return $stmt->execute($values);
    }

    // 查询单个
    public function getPostByCode($code) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE `code` = ?");
        $stmt->execute([$code]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 查询全部
    public function getAllPost() {
        $stmt = $this->pdo->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
