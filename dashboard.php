<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header(header: "Location: index.php");
    exit;
}
require_once 'db_connect.php';
$user_id = $_SESSION['user_id'];
$stmt_items = $conn->prepare(query: "SELECT * FROM menu_items WHERE user_id = ?");
$stmt_items->bind_param(types: "i", var: $user_id);
$stmt_items->execute();
$items_result = $stmt_items->get_result();
$stmt_orders = $conn->prepare(query: "SELECT orders.id, orders.quantity, orders.order_date, menu_items.name AS item_name FROM orders JOIN menu_items ON orders.item_id = menu_items.id WHERE menu_items.user_id = ?");
$stmt_orders->bind_param(types: "i", var: $user_id);
$stmt_orders->execute();
$orders_result = $stmt_orders->get_result();
?>


<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header(header: "Location: index.php");
    exit;
}
require_once 'db_connect.php';
$user_id = $_SESSION['user_id'];
$stmt_items = $conn->prepare(query: "SELECT * FROM menu_items WHERE user_id = ?");
$stmt_items->bind_param(types: "i", var: $user_id);
$stmt_items->execute();
$items_result = $stmt_items->get_result();
$stmt_orders = $conn->prepare(query: "SELECT orders.id, orders.quantity, orders.order_date, menu_items.name AS item_name FROM orders JOIN menu_items ON orders.item_id = menu_items.id WHERE menu_items.user_id = ?");
$stmt_orders->bind_param(types: "i", var: $user_id);
$stmt_orders->execute();
$orders_result = $stmt_orders->get_result();
?>

 <?php while ($order = $orders_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $order['id']; ?></td>
                        <td><?php echo htmlspecialchars(string: $order['item_name']); ?></td>
                        <td><?php echo $order['quantity']; ?></td>
                        <td><?php echo $order['order_date']; ?></td>
                    </tr>
                <?php endwhile; ?>

                <?php $stmt_items->close(); $stmt_orders->close(); $conn->close(); ?>
