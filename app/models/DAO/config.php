<?php 
// Đặt màu vào cookie với thời gian sống là 7 ngày
$color_time = time() + (7 * 24 * 60 * 60);
setcookie('start_color', '#ff0000', $color_time);
setcookie('mid_color', '#00ff00', $color_time);
setcookie('end_color', '#0000ff', $color_time);

?>