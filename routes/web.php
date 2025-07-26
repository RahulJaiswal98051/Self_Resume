    <?php   use App\Http\Controllers\SiteSettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\PersonalDetailsController;

Route::get('/', function () {
    return view('frontend.index');
});

// 🔐 Authentication Routes
Route::view('/index', 'frontend.index')->name('index');
Route::view('/signup', 'frontend.signup')->name('signup');
Route::view('/login', 'frontend.login')->name('login');
Route::post('/signup-submit', [SignupController::class, 'signup'])->name('signup-submit');
Route::post('/login-submit', [SignupController::class, 'login'])->name('login-submit');
Route::post('/logout', [SignupController::class, 'logout'])->name('logout');

// 🛠 Dashboard
Route::get('/dashboard', [SiteSettingController::class, 'index'])->name('dashboard');

// ⚙️ Site Settings
Route::get('/site-setting', [SiteSettingController::class, 'siteSetting'])->name('site-setting');
Route::post('/site-setting-submit', [SiteSettingController::class, 'siteSettingSubmit'])->name('site-setting-submit');

// 👥 User Management
Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management.index');
Route::get('/user-management/{user_management}/edit', [UserManagementController::class, 'edit'])->name('user-management.edit');
Route::put('/user-management/{user_management}', [UserManagementController::class, 'update'])->name('user-management.update');
Route::delete('/user-management/{user_management}', [UserManagementController::class, 'destroy'])->name('user-management.destroy');

// 🎓 Education CRUD
Route::resource('education', EducationController::class);

// 📄 Resume CRUD
Route::resource('resumes', ResumeController::class);

// 👤 Personal Details CRUD (Corrected route)
Route::resource('personal-details', PersonalDetailsController::class);

