<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบและสมัครสมาชิก</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="config.php">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Noto+Sans+Thai:wght@100..900&display=swap');
        body {
            font-family: 'Noto Sans Thai', 'Inter', sans-serif;
            background-color: #f3f4f6; /* Gray-100 background */
        }
        .form-input {
            transition: all 0.3s ease;
        }
        .form-input:focus {
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.5); /* Emerald-500 shadow */
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">

    <!-- Auth Card Container -->
    <div id="auth-card" class="w-full max-w-md bg-white p-8 sm:p-10 rounded-xl shadow-2xl transform transition duration-500 ease-in-out hover:shadow-3xl">
        
        <h1 id="form-title" class="text-3xl font-bold text-gray-800 mb-6 text-center">เข้าสู่ระบบ</h1>

        <!-- Form for Login/Register -->
        <form id="auth-form" action="login_handler.php" method="POST" class="space-y-5">
            
            <input type="hidden" name="mode" id="auth-mode" value="login">
            
            <!-- Email Field (Required for both) -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">อีเมล</label>
                <input type="email" id="email" name="email" class="form-input w-full p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500" placeholder="you@example.com" required>
            </div>

            <!-- Username Field (Only for Register) -->
            <div id="username-field" class="hidden">
                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">ชื่อผู้ใช้งาน</label>
                <input type="text" id="username" name="username" class="form-input w-full p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500" placeholder="username" autocomplete="off">
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">รหัสผ่าน</label>
                <input type="password" id="password" name="password" class="form-input w-full p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500" placeholder="รหัสผ่าน" required>
            </div>

            <!-- Submit Button -->
            <button id="submit-button" type="submit" class="w-full bg-emerald-500 text-white font-semibold py-3 rounded-xl hover:bg-emerald-600 transition duration-200 shadow-md hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-emerald-500 focus:ring-opacity-50">
                เข้าสู่ระบบ
            </button>
        </form>

        <!-- Toggle Mode Link -->
        <p class="mt-6 text-center text-sm text-gray-600">
            <span id="toggle-text">ยังไม่มีบัญชี?</span>
            <button id="toggle-mode-button" onclick="toggleAuthMode()" class="text-emerald-600 hover:text-emerald-700 font-medium transition duration-150 focus:outline-none">
                ลงทะเบียน
            </button>
        </p>
    </div>

    <script>
        const authForm = document.getElementById('auth-form');
        const formTitle = document.getElementById('form-title');
        const authModeInput = document.getElementById('auth-mode');
        const submitButton = document.getElementById('submit-button');
        const toggleModeButton = document.getElementById('toggle-mode-button');
        const toggleText = document.getElementById('toggle-text');
        const usernameField = document.getElementById('username-field');
        const usernameInput = document.getElementById('username');

        let currentMode = 'login'; // 'login' or 'register'

        // Function to toggle between Login and Register modes
        function toggleAuthMode() {
            if (currentMode === 'login') {
                // Switch to Register
                currentMode = 'register';
                formTitle.textContent = 'สร้างบัญชีใหม่';
                submitButton.textContent = 'สมัครสมาชิก';
                toggleText.textContent = 'มีบัญชีอยู่แล้ว?';
                toggleModeButton.textContent = 'เข้าสู่ระบบ';
                authModeInput.value = 'register';
                usernameField.classList.remove('hidden');
                usernameInput.required = true;
            } else {
                // Switch to Login
                currentMode = 'login';
                formTitle.textContent = 'เข้าสู่ระบบ';
                submitButton.textContent = 'เข้าสู่ระบบ';
                toggleText.textContent = 'ยังไม่มีบัญชี?';
                toggleModeButton.textContent = 'ลงทะเบียน';
                authModeInput.value = 'login';
                usernameField.classList.add('hidden');
                usernameInput.required = false;
            }
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('mode') === 'login') {
                currentMode = 'login';
                formTitle.textContent = 'เข้าสู่ระบบ';
                submitButton.textContent = 'เข้าสู่ระบบ';
                toggleText.textContent = 'ยังไม่มีบัญชี?';
                toggleModeButton.textContent = 'ลงทะเบียน';
                authModeInput.value = 'login';
                usernameField.classList.add('hidden');
                usernameInput.required = false;
            }
        }
    </script>

</body>
</html>