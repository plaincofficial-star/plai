<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>บันทึกข้อความลง Text File</title>
</head>
<body>
    <h2>กรอกข้อความที่ต้องการบันทึก</h2>
    <form action="save.php" method="POST">
        <label for="message">ข้อความ:</label><br>
        <textarea name="message" rows="4" cols="40" required></textarea><br><br>
        <button type="submit">บันทึกข้อมูล</button>
    </form>
</body>
</html>