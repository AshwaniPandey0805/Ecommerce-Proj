<?php 

namespace App\Traits;

trait SkuNumber {

    /**
     * function to genrate SKU ID
     */
    public function generateSkuId($productName){
        $subcategoryInitial = strtoupper(substr($productName, 0,2 ));
    
        // Generate a unique identifier (e.g., timestamp)
        $uniqueId = time(); // You can use a more sophisticated method for better uniqueness
    
        // Concatenate the initials and unique ID to form the SKU
        $sku = $subcategoryInitial . $uniqueId;
        
        return $sku;
    }
};

?>