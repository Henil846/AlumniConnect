<?php
use App\Core\Router;
use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\ProfileController;
use App\Controllers\DirectoryController;
use App\Controllers\MentorshipController;
use App\Controllers\ReferralsController;
use App\Controllers\JobsController;
use App\Controllers\EventsController;
use App\Controllers\EventsAdminController;
use App\Controllers\CommunityController;
use App\Controllers\MessagesController;
use App\Controllers\MarketplaceController;
use App\Controllers\DonationsController;
use App\Controllers\BusinessController;
use App\Controllers\StartupHubController;
use App\Controllers\CareerCenterController;
use App\Controllers\NotificationsController;
use App\Controllers\RewardsController;
use App\Controllers\AdsController;
use App\Controllers\AdminController;
use App\Controllers\SettingsController;
use App\Controllers\LegalController;
use App\Controllers\SearchController;
use App\Controllers\SuperAdminController;
use App\Middleware\AuthMiddleware;

Router::get('/signup', [AuthController::class, 'showSignup']);
Router::post('/signup', [AuthController::class, 'processSignup']);

Router::get('/login', [AuthController::class, 'showLogin']);
Router::post('/login', function() {
    \App\Middleware\RateLimitMiddleware::handle(60, 60);
    return (new AuthController())->processLogin();
});
Router::post('/logout', [AuthController::class, 'logout']);
Router::post('/logout-all', [AuthController::class, 'logoutAllDevices']);

Router::get('/verify', [AuthController::class, 'showVerify']);
Router::post('/verify', [AuthController::class, 'processVerify']);

Router::get('/forgot-password', [AuthController::class, 'showForgotPassword']);
Router::post('/forgot-password', [AuthController::class, 'processForgotPassword']);
Router::get('/reset-password', [AuthController::class, 'showResetPassword']);
Router::post('/reset-password', [AuthController::class, 'processResetPassword']);

Router::get('/dev/mailbox', function() {
    if (\App\Core\Env::get('APP_ENV', 'production') === 'production') {
        http_response_code(404);
        echo "404 Not Found";
        return;
    }
    $logFile = __DIR__ . '/../storage/logs/mail.log';
    if (file_exists($logFile)) {
        echo "<pre>" . htmlspecialchars(file_get_contents($logFile)) . "</pre>";
    } else {
        echo "Mailbox is empty.";
    }
});

Router::get('/dev/selftest-error', function() {
    if (\App\Core\Env::get('APP_ENV', 'production') === 'production') {
        http_response_code(404);
        return;
    }
    echo "<b>Notice</b>: Undefined variable \$uninitialized_var in /app/Controllers/TestController.php on line 42";
});

Router::get('/dev/selftest-empty', function() {
    if (\App\Core\Env::get('APP_ENV', 'production') === 'production') {
        http_response_code(404);
        return;
    }
    echo "    ";
});

Router::get('/dev/forced-exception', function() {
    if (\App\Core\Env::get('APP_ENV', 'production') === 'production') {
        http_response_code(404);
        return;
    }
    throw new \RuntimeException('Forced test exception for 500 verification');
});

Router::get('/dev/display-errors-check', function() {
    if (\App\Core\Env::get('APP_ENV', 'production') === 'production') {
        http_response_code(404);
        return;
    }
    echo json_encode(['display_errors' => ini_get('display_errors')]);
});

Router::get('/dashboard', function() {
    AuthMiddleware::handle();
    return (new DashboardController())->index();
});

Router::get('/profile', function() {
    AuthMiddleware::handle();
    return (new ProfileController())->index();
});

Router::post('/profile/update', function() {
    AuthMiddleware::handle();
    return (new ProfileController())->update();
});

Router::get('/profile/{id}', function($id) {
    AuthMiddleware::handle();
    return (new ProfileController())->viewProfile($id);
});

Router::get('/directory', function() {
    AuthMiddleware::handle();
    return (new DirectoryController())->index();
});

Router::get('/mentorship', function() {
    AuthMiddleware::handle();
    return (new MentorshipController())->index();
});

Router::post('/mentorship/book', function() {
    AuthMiddleware::handle();
    return (new MentorshipController())->book();
});

Router::post('/mentorship/update-status', function() {
    AuthMiddleware::handle();
    return (new MentorshipController())->updateStatus();
});

Router::post('/mentorship/cancel', function() {
    AuthMiddleware::handle();
    return (new MentorshipController())->cancel();
});

Router::get('/referral-request', function() {
    AuthMiddleware::handle();
    return (new ReferralsController())->index();
});

Router::get('/manage-referrals', function() {
    AuthMiddleware::handle();
    return (new ReferralsController())->index();
});

Router::post('/referral-request/submit', function() {
    AuthMiddleware::handle();
    return (new ReferralsController())->submit();
});

Router::post('/referral-request/update-status', function() {
    AuthMiddleware::handle();
    return (new ReferralsController())->updateStatus();
});

Router::get('/jobs', function() {
    AuthMiddleware::handle();
    return (new JobsController())->index();
});

Router::post('/jobs/apply', function() {
    AuthMiddleware::handle();
    return (new JobsController())->apply();
});

Router::post('/jobs/create', function() {
    AuthMiddleware::handle();
    return (new JobsController())->create();
});

Router::post('/jobs/delete', function() {
    AuthMiddleware::handle();
    return (new JobsController())->delete();
});

Router::post('/jobs/edit', function() {
    AuthMiddleware::handle();
    return (new JobsController())->edit();
});

Router::get('/events', function() {
    AuthMiddleware::handle();
    return (new EventsController())->index();
});

Router::post('/events/register', function() {
    AuthMiddleware::handle();
    return (new EventsController())->register();
});

Router::post('/events/cancel', function() {
    AuthMiddleware::handle();
    return (new EventsController())->cancel();
});

Router::get('/events-admin', function() {
    AuthMiddleware::handle();
    return (new EventsAdminController())->index();
});

Router::post('/events-admin/create', function() {
    AuthMiddleware::handle();
    return (new EventsAdminController())->create();
});

Router::post('/events-admin/checkin', function() {
    AuthMiddleware::handle();
    return (new EventsAdminController())->checkin();
});

Router::post('/events-admin/edit', function() {
    AuthMiddleware::handle();
    return (new EventsAdminController())->edit();
});

Router::post('/events-admin/delete', function() {
    AuthMiddleware::handle();
    return (new EventsAdminController())->delete();
});

Router::get('/events-admin/certificate', function() {
    AuthMiddleware::handle();
    return (new EventsAdminController())->generateCertificate();
});

Router::post('/events-admin/upload-gallery', function() {
    AuthMiddleware::handle();
    return (new EventsAdminController())->uploadGallery();
});

Router::get('/gallery', function() {
    // Basic route to serve gallery images since they're in storage
    $filename = $_GET['file'] ?? '';
    return (new EventsAdminController())->serveGalleryImage($filename);
});

Router::get('/community', function() {
    AuthMiddleware::handle();
    return (new CommunityController())->index();
});

Router::post('/community/post', function() {
    AuthMiddleware::handle();
    return (new CommunityController())->createPost();
});

Router::post('/community/like', function() {
    AuthMiddleware::handle();
    return (new CommunityController())->toggleLike();
});

Router::post('/community/comment', function() {
    AuthMiddleware::handle();
    return (new CommunityController())->addComment();
});

Router::post('/community/delete', function() {
    AuthMiddleware::handle();
    return (new CommunityController())->deletePost();
});

Router::post('/community/edit', function() {
    AuthMiddleware::handle();
    return (new CommunityController())->editPost();
});

Router::post('/community/poll-vote', function() {
    AuthMiddleware::handle();
    return (new CommunityController())->pollVote();
});

Router::post('/community/report', function() {
    AuthMiddleware::handle();
    return (new CommunityController())->report();
});

Router::post('/community/comment/delete', function() {
    AuthMiddleware::handle();
    return (new CommunityController())->deleteComment();
});

Router::get('/messages', function() {
    AuthMiddleware::handle();
    return (new MessagesController())->index();
});

Router::post('/messages/send', function() {
    AuthMiddleware::handle();
    return (new MessagesController())->send();
});

Router::post('/messages/delete', function() {
    AuthMiddleware::handle();
    return (new MessagesController())->deleteMessage();
});

Router::get('/messages/stream', function() {
    AuthMiddleware::handle();
    return (new MessagesController())->stream();
});

Router::get('/marketplace', function() {
    AuthMiddleware::handle();
    return (new MarketplaceController())->index();
});

Router::post('/marketplace/create', function() {
    AuthMiddleware::handle();
    return (new MarketplaceController())->create();
});

Router::post('/marketplace/delete', function() {
    AuthMiddleware::handle();
    return (new MarketplaceController())->delete();
});

Router::post('/marketplace/edit', function() {
    AuthMiddleware::handle();
    return (new MarketplaceController())->edit();
});

Router::get('/donations', function() {
    AuthMiddleware::handle();
    return (new DonationsController())->index();
});

Router::post('/donations/donate', function() {
    AuthMiddleware::handle();
    return (new DonationsController())->donate();
});

Router::get('/payment/checkout', function() {
    AuthMiddleware::handle();
    return (new \App\Controllers\PaymentController())->checkout();
});

Router::post('/payment/callback', function() {
    AuthMiddleware::handle();
    return (new \App\Controllers\PaymentController())->callback();
});

Router::get('/business-directory', function() {
    AuthMiddleware::handle();
    return (new BusinessController())->index();
});

Router::post('/business-directory/create', function() {
    AuthMiddleware::handle();
    return (new BusinessController())->create();
});

Router::post('/business-directory/edit', function() {
    AuthMiddleware::handle();
    return (new BusinessController())->edit();
});

Router::post('/business-directory/delete', function() {
    AuthMiddleware::handle();
    return (new BusinessController())->delete();
});

Router::get('/startup-hub', function() {
    AuthMiddleware::handle();
    return (new StartupHubController())->index();
});

Router::post('/startup-hub/create', function() {
    AuthMiddleware::handle();
    return (new StartupHubController())->create();
});

Router::post('/startup-hub/edit', function() {
    AuthMiddleware::handle();
    return (new StartupHubController())->edit();
});

Router::post('/startup-hub/delete', function() {
    AuthMiddleware::handle();
    return (new StartupHubController())->delete();
});

Router::get('/career-center', function() {
    AuthMiddleware::handle();
    return (new CareerCenterController())->index();
});

Router::post('/career-center/create', function() {
    AuthMiddleware::handle();
    return (new CareerCenterController())->create();
});

Router::get('/notifications', function() {
    AuthMiddleware::handle();
    return (new NotificationsController())->index();
});

Router::post('/notifications/mark-read', function() {
    AuthMiddleware::handle();
    return (new NotificationsController())->markRead();
});

Router::post('/notifications/mark-all-read', function() {
    AuthMiddleware::handle();
    return (new NotificationsController())->markAllRead();
});

Router::get('/rewards', function() {
    AuthMiddleware::handle();
    return (new RewardsController())->index();
});

Router::post('/rewards/award', function() {
    AuthMiddleware::handle();
    return (new RewardsController())->award();
});

Router::get('/ads', function() {
    AuthMiddleware::handle();
    return (new AdsController())->index();
});

Router::post('/ads/create', function() {
    AuthMiddleware::handle();
    return (new AdsController())->create();
});

Router::post('/ads/disable', function() {
    AuthMiddleware::handle();
    return (new AdsController())->disable();
});

// Help Center
Router::get('/help', function() {
    return \App\Core\View::render('help', ['title' => 'Help Center — Alumni Connect', 'activePage' => 'help'], 'app');
});

// Admin Routes
Router::get('/admin/dashboard', function() {
    AuthMiddleware::handle();
    return (new AdminController())->dashboard();
});

Router::get('/admin/moderation', function() {
    AuthMiddleware::handle();
    return (new AdminController())->moderation();
});

Router::post('/admin/moderation/resolve', function() {
    AuthMiddleware::handle();
    return (new AdminController())->resolveReport();
});

Router::get('/admin/payments', function() {
    AuthMiddleware::handle();
    return (new AdminController())->payments();
});

Router::get('/admin/analytics', function() {
    AuthMiddleware::handle();
    return (new AdminController())->analytics();
});

Router::post('/admin/users/status', function() {
    AuthMiddleware::handle();
    return (new AdminController())->updateUserStatus();
});

Router::post('/admin/users/role', function() {
    AuthMiddleware::handle();
    return (new AdminController())->updateUserRole();
});

// Settings
Router::get('/settings', function() {
    AuthMiddleware::handle();
    return (new SettingsController())->index();
});

Router::post('/settings/update', function() {
    AuthMiddleware::handle();
    return (new SettingsController())->update();
});

// Legal
Router::get('/terms', [LegalController::class, 'terms']);
Router::get('/privacy', [LegalController::class, 'privacy']);

// Global Search
Router::get('/search', function() {
    AuthMiddleware::handle();
    return (new SearchController())->index();
});

// Super Admin
Router::get('/super-admin/dashboard', function() {
    AuthMiddleware::handle();
    return (new SuperAdminController())->dashboard();
});
Router::get('/super-admin/analytics', function() {
    AuthMiddleware::handle();
    return (new SuperAdminController())->analytics();
});
Router::get('/super-admin/institutions', function() {
    AuthMiddleware::handle();
    return (new SuperAdminController())->institutions();
});
Router::post('/super-admin/institutions/create', function() {
    AuthMiddleware::handle();
    return (new SuperAdminController())->createInstitution();
});
Router::post('/super-admin/institutions/status', function() {
    AuthMiddleware::handle();
    return (new SuperAdminController())->updateInstitutionStatus();
});
Router::post('/super-admin/institutions/tier', function() {
    AuthMiddleware::handle();
    return (new SuperAdminController())->updateInstitutionTier();
});
Router::post('/super-admin/users/verify', function() {
    AuthMiddleware::handle();
    return (new SuperAdminController())->verifyUser();
});
Router::post('/super-admin/users/decline', function() {
    AuthMiddleware::handle();
    return (new SuperAdminController())->declineUser();
});
Router::get('/super-admin/revenue', function() {
    AuthMiddleware::handle();
    return (new SuperAdminController())->revenue();
});
Router::get('/super-admin/settings', function() {
    AuthMiddleware::handle();
    return (new SuperAdminController())->settings();
});

Router::get('/', [\App\Controllers\LandingController::class, 'index']);

Router::dispatch($uri, $_SERVER['REQUEST_METHOD']);
