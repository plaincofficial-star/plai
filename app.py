from flask import Flask, render_template, request
import mysql.connector

app = Flask(__name__)

# ตั้งค่าเชื่อมต่อฐานข้อมูล MySQL
db_config = {
    'host': 'localhost',
    'port': 3307,
    'user': 'root',
    'password': '12345678',  # รหัสผ่านใหม่ที่เราเพิ่งตั้งใน DBeaver
    'database': 'sys'          # ชื่อ Database ของคุณ (เปลี่ยนได้ตามจริงถ้าใช้ชื่ออื่น)
}

@app.route('/submit', methods=['POST'])
def submit_form():
    try:
        # รับค่าจากฟอร์ม HTML ตาม attribute 'name'
        full_name = request.form.get('full_name')
        email = request.form.get('email')
        subject = request.form.get('subject')
        message = request.form.get('message')

        # เชื่อมต่อ MySQL และบันทึกข้อมูล
        conn = mysql.connector.connect(**db_config)
        cursor = conn.cursor()
        
        sql = "INSERT INTO contact_messages (full_name, email, subject, message) VALUES (%s, %s, %s, %s)"
        val = (full_name, email, subject, message)
        
        cursor.execute(sql, val)
        conn.commit()
        
        cursor.close()
        conn.close()

        return "บันทึกข้อมูลสำเร็จเรียบร้อยครับ!"
    
    except Exception as e:
        return f"เกิดข้อผิดพลาด: {e}"

if __name__ == '__main__':
    app.run(debug=True)