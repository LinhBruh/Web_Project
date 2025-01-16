<h1>Thêm job tại đây</h1>

<form action="pages/postjobs/xuly.php" method="POST" enctype="multipart/form-data">
        <!-- Hình ảnh công ty -->
        <label for="companyImage">Hình ảnh công ty:</label>
        <input type="file" id="companyImage" name="companyImage" accept="image/*" required>

        <!-- Tên công ty -->
        <label for="companyName">Tên công ty:</label>
        <input type="text" id="companyName" name="companyName" placeholder="Nhập tên công ty" required>

        <!-- Địa chỉ -->
        <label for="companyAddress">Địa chỉ:</label>
        <input type="text" id="companyAddress" name="companyAddress" placeholder="Nhập địa chỉ công ty" required>

        <!-- Mô tả công ty -->
        <label for="companyDescription">Mô tả công ty:</label>
        <textarea id="companyDescription" name="companyDescription" rows="4" placeholder="Nhập mô tả công ty" required></textarea>

        <!-- Email công ty -->
        <label for="companyEmail">Email công ty:</label>
        <input type="email" id="companyEmail" name="companyEmail" placeholder="Nhập email công ty" required>

        <!-- Tên công việc -->
        <label for="jobTitle">Tên công việc:</label>
        <input type="text" id="jobTitle" name="jobTitle" placeholder="Nhập tên công việc" required>

        <!-- Mô tả công việc -->
        <label for="jobDescription">Mô tả công việc:</label>
        <textarea id="jobDescription" name="jobDescription" rows="4" placeholder="Nhập mô tả công việc" required></textarea>

        <!-- Loại danh mục -->
        <label for="jobKind">Loại công việc:</label>
        <input type="text" name = "jobKind" id = "jobKind" placeholder = "Nhập loại công việc vd: IT,Bussiness,..." required>

        <!-- Yêu cầu công việc -->
        <label for="jobRequirements">Yêu cầu công việc:</label>
        <textarea id="jobRequirements" name="jobRequirements" rows="4" placeholder="Nhập yêu cầu công việc" required></textarea>

        <!-- Vị trí công việc -->
        <label for="jobPosition">Vị trí công việc:</label>
        <input type="text" id="jobPosition" name="jobPosition" placeholder="Nhập vị trí công việc vd: Nhân vien,Giám đóc,..." required>

        <!-- Lương -->
        <label for="salary">Lương:</label>
        <input type="number" id="salary" name="salary" placeholder="Nhập mức lương, tính theo $" required>

        <!-- Kiểu công việc -->
        <label for="jobType">Kiểu công việc:</label>
        <select id="jobType" name="jobType" required>
            <option value="Full-Time">Toàn thời gian</option>
            <option value="Part-Time">Bán thời gian</option>
            <option value="Contract">Hợp đồng</option>
            <option value="Internship">Thực tập</option>
            <option value="Freelancer">Tự do</option>
            <option value="Fresher">Người mới</option>
        </select>

        <!-- Trạng thái công việc -->
        <label for="jobStatus">Trạng thái công việc:</label>
        <select id="jobStatus" name="jobStatus" required>
            <option value="active">Đang tuyển</option>
            <option value="inactive">Ngưng tuyển</option>
        </select>

        <!-- Nút Gửi -->
        <input style = "background-color:#45a049;" type="submit" name ="them" value="Thêm Job">
</form>
