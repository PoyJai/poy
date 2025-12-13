<?php
session_start();
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โลกแห่งเกมอันงดงาม</title>
    <!-- โหลด Tailwind CSS CDN เพื่อการออกแบบที่รวดเร็วและสวยงาม -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- กำหนดค่าเริ่มต้นของ Tailwind และใช้ฟอนต์ Inter -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#4F46E5', // Indigo-600
                        'secondary': '#F97316', // Orange-600
                        'background': '#1F2937', // Gray-800
                        'card': '#374151', // Gray-700
                    },
                    fontFamily: {
                        sans: ['Inter', 'Tahoma', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        /* ตั้งค่าพื้นหลังและสีข้อความพื้นฐาน */
        body {
            background-color: #1F2937;
            color: #F3F4F6;
        }
        /* สำหรับปุ่มที่มีสไตล์โดดเด่น */
        .btn-primary {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.5), 0 4px 6px -4px rgba(79, 70, 229, 0.5);
        }
        /* สไตล์สำหรับการ์ดเกม */
        .game-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .game-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2), 0 8px 10px -6px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body>

    <!-- ส่วนหัว (Header) และแถบนำทาง (Navigation) -->
    <header class="sticky top-0 z-50 bg-background/90 backdrop-blur-sm shadow-lg">
        <nav class="container mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <div class="text-2xl font-bold text-primary">
                เจ๊ปอย<span class="text-secondary">.เช่าเกม</span>
            </div>
            <!-- Links and Auth Button -->
            <div class="hidden md:flex space-x-8 text-lg font-medium items-center">
                <a href="#" class="hover:text-primary transition duration-150">หน้าแรก</a>
                <a href="#featured" class="hover:text-primary transition duration-150">เกมทั้งหมด</a>
                <a href="payment.html" class="hover:text-primary transition duration-150">Payment</a>              
                <!-- Authentication Status/Button Container -->
            <div id="auth-status-container">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <span class="mr-3 text-primary">
                        สวัสดี, <?php echo $_SESSION['username']; ?>
                    </span>
                    <a href="logout.php">
                        <button class="px-4 py-2 bg-gray-600 rounded-full text-white">
                            ออกจากระบบ
                        </button>
                    </a>
                <?php else: ?>
                    <a href="login_from.php">
                        <button class="px-4 py-2 bg-secondary rounded-full text-white">
                            เข้าสู่ระบบ / สมัคร
                        </button>
                    </a>

                <?php endif; ?>
            </div>

            </div>
            <!-- ปุ่มเมนูสำหรับมือถือ -->
            <button id="menu-button" class="md:hidden focus:outline-none p-2 rounded-lg hover:bg-card">
                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
            </button> 
        </nav>
        <!-- เมนูมือถือ (ซ่อนไว้ก่อน) -->
        <div id="mobile-menu" class="hidden md:hidden bg-card/95 py-2">
            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-600 transition duration-150">หน้าแรก</a>
            <a href="#featured" class="block px-4 py-2 text-sm hover:bg-gray-600 transition duration-150">เกมสวยงาม</a>
            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-600 transition duration-150">Payment</a>
             <div id="auth-mobile-status" class="px-4 py-2">
                <a href="login_from.php"></a>
                 <button id="auth-button-mobile" class="w-full px-4 py-2 bg-secondary rounded-full text-white font-semibold hover:bg-orange-700 transition duration-300">เข้าสู่ระบบ / สมัคร</button>
            </div>
        </div>
    </header>

    <main>
        <!-- ส่วน Hero Section -->
        <section class="relative h-[60vh] md:h-[80vh] flex items-center justify-center text-center bg-cover bg-center" 
                 style="background-image: url('https://wallpapercat.com/w/full/0/c/c/126192-3840x2160-desktop-4k-game-of-thrones-wallpaper-photo.jpg');">
            <!-- Overlay สีดำกึ่งโปร่งใสเพื่อให้ข้อความอ่านง่าย -->
            <div class="absolute inset-0 bg-background/70"></div>
            <div class="relative z-10 p-6 max-w-4xl mx-auto">
                <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold leading-tight mb-4 text-white">
                    ศิล<span class="text-primary">ปะ</span>และความงดงามที่จับต้องได้
                </h1>
                <p class="text-lg sm:text-xl text-gray-300 mb-8">
                    ค้นพบจักรวาลของเกมที่สร้างสรรค์ด้วยภาพที่สวยงาม และเรื่องราวที่น่าหลงใหล
                </p>
                <a href="#featured" class="btn-primary inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-full text-white bg-primary hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                    สำรวจเกม
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
        </section>

        <!-- ส่วน Featured Game Collection -->
        <section id="featured" class="py-16 md:py-24 container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl md:text-5xl font-bold text-center mb-12 text-white">
                คอลเลกชันเกมยอดนิยม
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- การ์ดเกม 1 -->
                <div class="game-card bg-card rounded-xl overflow-hidden shadow-2xl">
                    <img src="https://logos-world.net/wp-content/uploads/2021/03/FiveM-Symbol.png" alt="ภาพเกม Fantasy Aesthetic" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <a href="game0.1.html">
                        <h3 class="text-xl font-bold text-white mb-2">Five M</h3>
                        <p class="text-gray-400 text-sm mb-4">กราฟิกเซลเฉดที่ละมุนตาและโลกที่เต็มไปด้วยความลับ</p>
                        <span class="inline-block bg-primary/20 text-primary text-xs font-semibold px-3 py-1 rounded-full">Indie</span></a>
                    </div>
                </div>

                <!-- การ์ดเกม 2 -->
                <div class="game-card bg-card rounded-xl overflow-hidden shadow-2xl">
                    <img src="https://media.sketchfab.com/models/5848769ca37f442eb9d100374d02be4b/thumbnails/18ac83c88c7642acb4c76f900b9d152e/6b46efc4de46443aa067a74d63f4a4c9.jpeg" alt="ภาพเกม Sci-Fi Minimalist" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <a href="game0.2.html">
                        <h3 class="text-xl font-bold text-white mb-2">Pub g</h3>
                        <p class="text-gray-400 text-sm mb-4">การออกแบบยานอวกาศที่เรียบง่าย แต่มีสไตล์และอนาคต</p>
                        <span class="inline-block bg-secondary/20 text-secondary text-xs font-semibold px-3 py-1 rounded-full">Simulation</span></a>
                    </div>
                </div>

                <!-- การ์ดเกม 3 -->
                <div class="game-card bg-card rounded-xl overflow-hidden shadow-2xl">
                    <img src="https://image.api.playstation.com/vulcan/ap/rnd/202407/0401/670c294ded3baf4fa11068db2ec6758c63f7daeb266a35a1.png" alt="ภาพเกม Serene Nature" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <a href="game0.3.html">
                        <h3 class="text-xl font-bold text-white mb-2">Minecraft</h3>
                        <p class="text-gray-400 text-sm mb-4">ดื่มด่ำกับป่าไม้และทะเลสาบที่ถูกวาดอย่างประณีต</p>
                        <span class="inline-block bg-green-500/20 text-green-500 text-xs font-semibold px-3 py-1 rounded-full">Adventure</span></a>
                    </div>
                </div>

                <!-- การ์ดเกม 4 -->
                <div class="game-card bg-card rounded-xl overflow-hidden shadow-2xl">
                    <img src="https://store-images.s-microsoft.com/image/apps.19344.14082742796871732.7467348b-0622-4793-a9c9-1d21ce257c67.0d642987-9b9f-4a80-9ed9-0f67dffa7d23" alt="ภาพเกม Retro Pixel Art" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <a href="game0.4.html">
                        <h3 class="text-xl font-bold text-white mb-2">EA SPORTS FC™ 25 </h3>
                        <p class="text-gray-400 text-sm mb-4">เสน่ห์ของภาพพิกเซลที่ลงตัวและมีชีวิตชีวา</p>
                        <span class="inline-block bg-pink-500/20 text-pink-500 text-xs font-semibold px-3 py-1 rounded-full">Platformer</span></a>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                 <a href="allgame.html" class="inline-flex items-center justify-center px-6 py-3 border border-secondary text-base font-medium rounded-full text-secondary hover:bg-secondary hover:text-white transition duration-300">
                    ดูเกมทั้งหมด
                 </a>
            </div>
        </section>
    </main>

    <!-- ส่วนท้าย (Footer) -->
    <footer class="bg-card border-t border-gray-700 mt-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 text-center text-gray-400">
            <div class="flex flex-col md:flex-row justify-center space-y-2 md:space-y-0 md:space-x-8 mb-4">
                <a href="#" class="hover:text-primary transition duration-150">นโยบายความเป็นส่วนตัว</a>
                <a href="#" class="hover:text-primary transition duration-150">ข้อกำหนดการใช้งาน</a>
            </div>
            <p>&copy; 2025 โลกแห่งเกมอันงดงาม (AESTHETIC.GAMES) | สงวนลิขสิทธิ์</p>
        </div>
    </footer>

    <!-- 

    <!-- Firebase SDK Imports (MUST be defined before the script below) -->
    <script type="module">
        import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-app.js";
        import { getAuth, signInAnonymously, signInWithCustomToken, onAuthStateChanged, createUserWithEmailAndPassword, signInWithEmailAndPassword, signOut } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-auth.js";
        import { getFirestore, doc, setDoc, getDoc } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-firestore.js";
        import { setLogLevel } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-app.js";

        // กำหนดให้ Firebase แสดง log ในโหมด Debug
        setLogLevel('Debug');

        // Global variables provided by the environment
        const appId = typeof __app_id !== 'undefined' ? __app_id : 'default-app-id';
        const firebaseConfig = JSON.parse(typeof __firebase_config !== 'undefined' ? __firebase_config : '{}');
        const initialAuthToken = typeof __initial_auth_token !== 'undefined' ? __initial_auth_token : null;

        let app, db, auth;
        let isSignUpMode = false; // สถานะปัจจุบันของ Modal: false=Login, true=Signup

        // --- DOM Elements ---
        const authButton = document.getElementById('auth-button');
        const authButtonMobile = document.getElementById('auth-button-mobile');
        const authStatusContainer = document.getElementById('auth-status-container');
        const authMobileStatus = document.getElementById('auth-mobile-status');
        const authModal = document.getElementById('auth-modal');
        const closeModalButton = document.getElementById('close-modal-button');
        const authTitle = document.getElementById('auth-title');
        const authForm = document.getElementById('auth-form');
        const submitAuthButton = document.getElementById('submit-auth-button');
        const toggleAuthModeButton = document.getElementById('toggle-auth-mode');
        const toggleAuthText = document.getElementById('toggle-auth-text');
        const authErrorMessage = document.getElementById('auth-error-message');
        const currentUserIdElement = document.getElementById('current-user-id');
        const testerRequestCheckboxContainer = document.getElementById('tester-request-checkbox-container'); // NEW
        const requestTesterAccessCheckbox = document.getElementById('request-tester-access'); // NEW
        
        // --- Firebase Initialization and Authentication ---

        const initializeFirebase = async () => {
            try {
                app = initializeApp(firebaseConfig);
                db = getFirestore(app);
                auth = getAuth(app);
                
                // Sign in using custom token or anonymously
                if (initialAuthToken) {
                    await signInWithCustomToken(auth, initialAuthToken);
                } else {
                    await signInAnonymously(auth);
                }

                // Listen for authentication state changes
                onAuthStateChanged(auth, handleAuthStateChanged);

            } catch (error) {
                console.error("Firebase Initialization or Sign-In Error:", error);
                displayError(`เกิดข้อผิดพลาดในการเชื่อมต่อ: ${error.message}`);
            }
        };

        const handleAuthStateChanged = (user) => {
            if (user) {
                // User is signed in
                const userId = user.uid;
                currentUserIdElement.textContent = userId;
                updateHeaderForSignedInUser(user);
                console.log("User signed in with ID:", userId);

                // Check if user is an email user to manage profile/last login time
                if (user.email) {
                    // Update last login time or create profile if it's the first time
                    // We pass an empty object here as initialData, so it only creates/updates the last login time.
                    createOrUpdateUserProfile(userId, user.email, {}); 
                }
                
            } else {
                // User is signed out (or anonymous sign-in failed)
                currentUserIdElement.textContent = '-- N/A --';
                updateHeaderForSignedOutUser();
                console.log("User signed out.");
            }
        };

        // --- Firestore User Profile Management ---

        const getUserProfileDocRef = (userId) => {
            // Path: /artifacts/{appId}/users/{userId}/profiles/main_profile
            return doc(db, 'artifacts', appId, 'users', userId, 'profiles', 'main_profile');
        };

        /**
         * สร้างหรืออัปเดตโปรไฟล์ผู้ใช้ใน Firestore
         * @param {string} userId - UID ของผู้ใช้
         * @param {string} email - อีเมลของผู้ใช้
         * @param {Object} initialData - ข้อมูลเพิ่มเติมที่จะใส่เมื่อสร้างโปรไฟล์ใหม่ (เช่น requestTesterAccess)
         */
        const createOrUpdateUserProfile = async (userId, email, initialData = {}) => {
            const profileRef = getUserProfileDocRef(userId);
            try {
                const docSnap = await getDoc(profileRef);
                const now = new Date().toISOString();

                if (!docSnap.exists()) {
                    // สร้างเอกสารโปรไฟล์ใหม่
                    await setDoc(profileRef, {
                        email: email,
                        createdAt: now,
                        lastLoginAt: now,
                        displayName: email.split('@')[0], // ใช้ prefix ของอีเมลเป็นชื่อเริ่มต้น
                        ...initialData // ใส่ข้อมูลเพิ่มเติมที่ส่งมา เช่น คำขอตัวเทส
                    });
                    console.log("User profile created successfully.");
                } else {
                    // อัปเดตเวลาเข้าสู่ระบบล่าสุดเท่านั้น
                    await setDoc(profileRef, { lastLoginAt: now }, { merge: true });
                }
            } catch (error) {
                console.error("Error managing user profile in Firestore:", error);
            }
        };


        // --- Auth UI/Modal Functions ---

        const toggleAuthMode = () => {
            isSignUpMode = !isSignUpMode;
            if (isSignUpMode) {
                authTitle.textContent = 'สมัครสมาชิก';
                submitAuthButton.textContent = 'สมัครสมาชิก';
                toggleAuthText.innerHTML = 'มีบัญชีอยู่แล้ว? <button type="button" id="toggle-auth-mode" class="text-secondary hover:text-orange-400 font-medium">เข้าสู่ระบบ</button>';
                testerRequestCheckboxContainer.classList.remove('hidden'); // NEW: Show checkbox
            } else {
                authTitle.textContent = 'เข้าสู่ระบบ';
                submitAuthButton.textContent = 'เข้าสู่ระบบ';
                toggleAuthText.innerHTML = 'ยังไม่มีบัญชี? <button type="button" id="toggle-auth-mode" class="text-secondary hover:text-orange-400 font-medium">สมัครสมาชิก</button>';
                testerRequestCheckboxContainer.classList.add('hidden'); // NEW: Hide checkbox
            }
            // Re-attach event listener for the new button instance
            document.getElementById('toggle-auth-mode').addEventListener('click', toggleAuthMode);
            hideError();
        };

        const openAuthModal = (mode = 'login') => {
            isSignUpMode = (mode === 'signup');
            toggleAuthMode(); // Set initial texts and visibility
            authModal.classList.remove('hidden');
        };

        const closeAuthModal = () => {
            authModal.classList.add('hidden');
            authForm.reset();
            hideError();
        };

        const displayError = (message) => {
            authErrorMessage.textContent = message;
            authErrorMessage.classList.remove('hidden');
        };

        const hideError = () => {
            authErrorMessage.classList.add('hidden');
            authErrorMessage.textContent = '';
        };

        // --- UI Update based on Auth State ---

        const updateHeaderForSignedInUser = (user) => {
            const displayName = user.email ? user.email.split('@')[0] : 'ผู้ใช้';
            
            // Desktop/Tablet
            authStatusContainer.innerHTML = `
                <div class="flex items-center space-x-4">
                    <span class="text-sm font-medium text-primary">สวัสดี, ${displayName}</span>
                    <button id="sign-out-button" class="px-4 py-2 bg-gray-600 rounded-full text-white font-semibold hover:bg-gray-700 transition duration-300">ออกจากระบบ</button>
                </div>
            `;
            // Mobile
            authMobileStatus.innerHTML = `
                <div class="text-sm font-medium text-primary mb-2 text-center">สวัสดี, ${displayName}</div>
                <button id="sign-out-button-mobile" class="w-full px-4 py-2 bg-gray-600 rounded-full text-white font-semibold hover:bg-gray-700 transition duration-300">ออกจากระบบ</button>
            `;
            
            document.getElementById('sign-out-button')?.addEventListener('click', handleSignOut);
            document.getElementById('sign-out-button-mobile')?.addEventListener('click', handleSignOut);
        };

        const updateHeaderForSignedOutUser = () => {
            // Desktop/Tablet
            authStatusContainer.innerHTML = `
                <button id="auth-button" class="px-4 py-2 bg-secondary rounded-full text-white font-semibold hover:bg-orange-700 transition duration-300">เข้าสู่ระบบ / สมัคร</button>
            `;
             // Mobile
            authMobileStatus.innerHTML = `
                <button id="auth-button-mobile" class="w-full px-4 py-2 bg-secondary rounded-full text-white font-semibold hover:bg-orange-700 transition duration-300">เข้าสู่ระบบ / สมัคร</button>
            `;
            
            document.getElementById('auth-button')?.addEventListener('click', () => openAuthModal('login'));
            document.getElementById('auth-button-mobile')?.addEventListener('click', () => openAuthModal('login'));
        };

        // --- Auth Submission Handlers ---

        const handleAuthSubmit = async (e) => {
            e.preventDefault();
            hideError();

            const email = document.getElementById('auth-email').value;
            const password = document.getElementById('auth-password').value;

            submitAuthButton.disabled = true;
            submitAuthButton.textContent = isSignUpMode ? 'กำลังสมัคร...' : 'กำลังเข้าสู่ระบบ...';

            try {
                if (isSignUpMode) {
                    // --- Custom Tester Check for Test Environment (NEW) ---
                    let requestTester = requestTesterAccessCheckbox.checked;
                    
                    const testEmail = 'test@gmail.com';
                    const testPassword = 'pass123456789';

                    // หากข้อมูลตรงกับบัญชีทดสอบที่กำหนด ให้ถือว่าเป็น Tester ทันที
                    if (email === testEmail && password === testPassword) {
                        requestTester = true;
                        console.log(`Test user ${testEmail} is registering and automatically granted tester access.`);
                    }
                    // --- End Custom Tester Check ---

                    // 1. Sign Up
                    const userCredential = await createUserWithEmailAndPassword(auth, email, password);
                    const user = userCredential.user;

                    // 2. Prepare initial data (using potentially forced tester status)
                    let initialData = {};
                    if (requestTester) {
                        const now = new Date().toISOString();
                        initialData.requestedTesterAccess = true;
                        initialData.testerRequestDate = now;
                    }
                    
                    // 3. Create User Profile (including tester request data)
                    await createOrUpdateUserProfile(user.uid, email, initialData); 
                    
                } else {
                    // Log In
                    await signInWithEmailAndPassword(auth, email, password);
                    // Profile/lastLoginAt update handled by onAuthStateChanged
                }
                
                // If successful, close modal
                closeAuthModal();

            } catch (error) {
                console.error("Authentication Error:", error);
                let errorMessage;
                switch (error.code) {
                    case 'auth/email-already-in-use':
                        errorMessage = 'อีเมลนี้ถูกใช้ในการสมัครแล้ว';
                        break;
                    case 'auth/invalid-email':
                        errorMessage = 'รูปแบบอีเมลไม่ถูกต้อง';
                        break;
                    case 'auth/weak-password':
                        errorMessage = 'รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร';
                        break;
                    case 'auth/user-not-found':
                    case 'auth/wrong-password':
                        errorMessage = 'อีเมลหรือรหัสผ่านไม่ถูกต้อง';
                        break;
                    case 'auth/operation-not-allowed':
                        // ข้อผิดพลาดนี้เกิดจากการที่ไม่ได้เปิดใช้งาน Email/Password ใน Firebase Console
                        errorMessage = 'ไม่สามารถดำเนินการได้: ต้องเปิดใช้งานการลงชื่อเข้าใช้ด้วยอีเมล/รหัสผ่านใน Firebase Console ก่อน';
                        break;
                    default:
                        errorMessage = `เกิดข้อผิดพลาด: ${error.message}`;
                }
                displayError(errorMessage);
            } finally {
                submitAuthButton.disabled = false;
                submitAuthButton.textContent = isSignUpMode ? 'สมัครสมาชิก' : 'เข้าสู่ระบบ';
            }
        };

        const handleSignOut = async () => {
            try {
                await signOut(auth);
                // onAuthStateChanged will handle UI update
            } catch (error) {
                console.error("Sign Out Error:", error);
            }
        };

        // --- Main Initialization and Event Listeners ---
        
        document.addEventListener('DOMContentLoaded', () => {
            // 1. Initialize Firebase and Auth
            initializeFirebase();

            // 2. Set up event listeners for the mobile menu
            const menuButton = document.getElementById('menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            menuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            // 3. Set up Auth Modal event listeners
            document.getElementById('auth-button').addEventListener('click', () => openAuthModal('login'));
            document.getElementById('auth-button-mobile').addEventListener('click', () => openAuthModal('login'));
            closeModalButton.addEventListener('click', closeAuthModal);
            document.getElementById('toggle-auth-mode').addEventListener('click', toggleAuthMode);
            authForm.addEventListener('submit', handleAuthSubmit);

            // Optional: Close modal when clicking outside (on the overlay)
            authModal.addEventListener('click', (e) => {
                if (e.target === authModal) {
                    closeAuthModal();
                }
            });
        });
    </script>
</body>
</html>