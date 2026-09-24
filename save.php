<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากฟอร์ม
    $message = $_POST['message'];
    
    // กำหนดชื่อไฟล์ Text ที่จะเก็บข้อมูล
    $filename = "data.txt";
    
    // จัดรูปแบบข้อความ (เพิ่มขึ้นบรรทัดใหม่ทุกครั้งที่บันทึก)
    $data = "ข้อความ: " . $message . " | เวลา: " . date("Y-m-d H:i:s") . "\n";
    
    // บันทึกข้อมูลลงไฟล์ (FILE_APPEND คือต่อท้ายข้อมูลเดิม ไม่ให้ทับของเก่า)
    file_put_contents($filename, $data, FILE_APPEND | LOCK_EX);
    
    echo "<h3>บันทึกข้อมูลลงไฟล์สำเร็จ!</h3>";
    echo '<a href="form.php">กลับไปกรอกเพิ่ม</a> | ';
    echo '<a href="data.txt" target="_blank">ดูไฟล์ Text ทั้งหมด</a>';
} else {
    header("Location: form.php");
    exit();
}
?>