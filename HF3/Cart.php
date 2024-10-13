<?php


class Cart
{
    /**
     * @var CartItem[]
     */
    private array $items = [];

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Product $product
     * @param int $quantity
     * @return CartItem
     */
    public function addProduct(Product $product, int $quantity): CartItem
    {
        foreach ($this->items as $item) {
            if ($item->getProduct()->getId() === $product->getId()) {
                $itemQuantity = $item->getQuantity() + $quantity;
                $itemQuantity = min($itemQuantity, $product->getAvailableQuantity());
                $item->setQuantity($itemQuantity);
                return $item;
            }
        }
        $quantity = min($quantity, $product->getAvailableQuantity());
        $cartItem = new CartItem($product, $quantity);
        $this->items[] = $cartItem;
        return $cartItem;
    }

    /**
     * Remove product from cart
     *
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {

        foreach ($this->items as $key => $item) {
            if ($item->getProduct()->getId() === $product->getId()) {
                unset($this->items[$key]);
                break;
            }
        }
    }


    /**
     * This returns total number of products added in cart
     *
     * @return int
     */
    public function getTotalQuantity(): int
    {
        $totalQuantity = 0;
        foreach ($this->items as $item) {
            $totalQuantity += $item->getQuantity();
        }
        return $totalQuantity;
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum(): float
    {
        $totalSum = 0.0;
        foreach ($this->items as $item) {
            $product = $item->getProduct();
            $itemTotal = $item->getQuantity() * $product->getPrice();
            $totalSum += $itemTotal;
        }
        return $totalSum;
    }
}