# PayFlex OpenCart Extension

PayFlex payment module for OpenCart v2.3

## Overview

This extension integrates PayFlex's "Buy Now, Pay Later" payment solution with OpenCart 2.3, allowing customers to split their purchases into interest-free installments.

## Installation

1. **Download and Extract**
   - Download the module archive
   - Extract to a temporary location on your computer

2. **Upload Files**
   - Copy the contents of the "upload" folder to your OpenCart root directory
   - This will add PayFlex files without overwriting existing OpenCart files

3. **Install Module**
   - Log in to your OpenCart admin panel
   - Navigate to **Extensions > Payments**
   - Find "PayFlex" in the payment methods list
   - Click the **Install** button

4. **Configure Module**
   - Click the **Edit** button next to PayFlex
   - Configure the following settings:
     - Payment status for completed orders
     - Payment status for failed orders
     - Payment status for pending orders
     - Sandbox mode (for testing)
     - Enable/disable the payment method
   - Click **Save** to apply changes

5. **Testing**
   - The module is now ready for testing in sandbox mode
   - Ensure all payment flows work correctly before going live

## Manual Widget Installation

**Note:** OpenCart 2.3 uses hardcoded templates, so the product page widget must be added manually.

To add the PayFlex calculator widget to your product pages:

1. Locate your product template file:
   ```
   catalog/view/theme/[your_theme]/template/product/product.tpl
   ```

2. Find where you want the widget to display (typically near the price or add-to-cart button)

3. Insert the following code:
   ```html
   <div class="payflex-widget">
     <script async 
             src="https://widgets.payflex.co.za/payflex-widget-2.0.0.js?type=calculator&amount=<?php echo $price; ?>" 
             type="application/javascript">
     </script>
   </div>
   ```

## Support

For technical support and documentation, visit:
**https://www.payflex.co.za**