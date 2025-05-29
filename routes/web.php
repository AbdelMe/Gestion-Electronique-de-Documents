<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\RubriqueController;
use App\Http\Controllers\RubriqueDocumentController;
use App\Http\Controllers\TypeDocumentController;
use App\Http\Controllers\TypeRubriqueController;
use App\Http\Controllers\VersionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DroitController;
use App\Http\Controllers\DroitUserController;
use App\Http\Controllers\EtatController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\TypeUserController;
use App\Http\Middleware\UpdateLastSeen;
use App\Livewire\EditDocument;
use App\Models\Classe;
use App\Models\Document;
use App\Models\Dossier;
use App\Models\Entreprise;
use App\Models\Etat;
use App\Models\TypeUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Public routes
Route::get('/', function () {
    return view('auth.login');
});

// Authentication Routes
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);

// Authenticated routes
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        $users = User::all();
        $classe = Classe::all();
        $dossiers = Dossier::all();
        $documents = Document::all();





        $documentData = $documents->map(function ($document) {
            return [
                'titre' => $document->titre,
                'size_gb' => number_format($document->size / 1073741824, 2),
                'size_mb' => number_format($document->size / 1048576, 2),
            ];
        });

        $totalSizeGb = number_format($documents->sum('size') / 1073741824, 2);
        $totalSizeMb = number_format($documents->sum('size') / 1048576, 2);

        $recentDocuments = Document::orderBy('created_at', 'desc')->take(5)->get();
        $recentActivities = [];

        foreach ($recentDocuments as $document) {
            // if ($document->Dossier->entreprise->id == Auth::user()->entreprise_id){

            $recentActivities[] = [
                'id' => $document->id,
                'type' => 'document',
                'name' => $document->LibelleDocument,
                'file_path' => $document->CheminDocument,
                'created_at' => $document->created_at,
                'is_new' => $document->created_at->isToday(),
            ];
            // }
        }

        usort($recentActivities, function ($a, $b) {
            return $b['created_at'] <=> $a['created_at'];
        });
        return view('dashboard', compact('users', 'dossiers', 'documents', 'recentActivities', 'documentData', 'totalSizeMb', 'totalSizeGb'));
    })->name('dashboard');



    Route::resource('/entreprise', EntrepriseController::class)->names('entreprise');
    Route::resource('/dossiers', DossierController::class);

    Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::get('/documents/create', [DocumentController::class, 'create'])->name('documents.create');
    Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('/documents/{document}/edit', [DocumentController::class, 'edit'])->name('documents.edit');
    Route::put('/documents/{document}', [DocumentController::class, 'update'])->name('documents.update');
    Route::get('/documents/show/{document}', [DocumentController::class, 'show'])->name('documents.show');
    Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');

    Route::get('/documents/SelectedType', [DocumentController::class, 'SelectedType'])->name('documents.SelectedType');
    Route::put('/document/{id}/update-etat', [DocumentController::class, 'updateEtat'])->name('document.updateEtat');
    Route::put('/document/{id}/update-classe', [DocumentController::class, 'updateClasse'])->name('document.updateClasse');


    Route::resource('/type_documents', TypeDocumentController::class);
    Route::resource('/rubrique', RubriqueController::class);


    Route::resource('/type_rubrique', TypeRubriqueController::class);

    Route::resource('/rubrique_document', RubriqueDocumentController::class);

    Route::resource('/roles', TypeUserController::class);
    Route::get('/assign-role', [TypeUserController::class, 'assignRole'])->name('roles.assignRole');
    Route::get('/revokeRole', [TypeUserController::class, 'revokeRoleIndex'])->name('roles.revokeRole');
    Route::delete('/roles/revoke/{user}/{role}', [TypeUserController::class, 'revokeRoleDelete'])->name('roles.revokeRoleDelete');
    Route::post('/assignRoleStore', [TypeUserController::class, 'assignRoleStore'])->name('roles.assignRoleStore');
    Route::resource('/permitions', DroitController::class);
    Route::delete('/bulk-revoke', [TypeUserController::class, 'bulkRevoke'])->name('roles.bulkRevoke');
    Route::post('/bulk-assign', [TypeUserController::class, 'bulkAssign'])->name('roles.bulkAssign');


    // Route::get('/loginn', function () {
    //     return view('Login.index');
    // });

    // Route::resource('/documents/{document}', [DocumentController::class , 'download']);
    Route::get('/documents/download/{document}', [DocumentController::class, 'download'])
        ->name('documents.download');


    Route::resource('/versions', VersionController::class);
    Route::resource('/classe', ClasseController::class);

    Route::get('/documents/{document}/versions', [DocumentController::class, 'versions'])
        ->name('documents.versions');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

    //Roles & Permissions
    Route::get('/RolePermissions', [DroitUserController::class, 'index'])->name('user_permissions.index');
    Route::get('/assignPermitionsToRole', [DroitUserController::class, 'assignPermitionsToRole'])->name('user_permissions.assignPermitionsToRole');
    Route::post('/storeAssignPermitionsToRole', [DroitUserController::class, 'storeAssignPermitionsToRole'])->name('user_permissions.storeAssignPermitionsToRole');
    Route::get('/editRolePermissions/{role}/edit', [DroitUserController::class, 'editRolePermissions'])->name('user_permissions.editRolePermissions');
    Route::put('/updateRolePermissions/{role}/permissions', [DroitUserController::class, 'updateRolePermissions'])->name('user_permissions.updateRolePermissions');
    Route::delete('/deletePermition/{role}/deletePermition/{permission}', [DroitUserController::class, 'deletePermition'])->name('user_permissions.deletePermition');
    Route::delete('/revokeAllPermissions/{role}', [DroitUserController::class, 'revokeAllPermissions'])->name('user_permissions.revokeAllPermissions');


    //user Managements & Permissions
    Route::get('/users', [AuthController::class, 'index'])->name('users.index');
    Route::get('/AddUser', [AuthController::class, 'AddUser'])->name('users.AddUser');
    Route::post('/StoreUser', [AuthController::class, 'StoreUser'])->name('users.StoreUser');
    Route::put('/blockUser/{user}', [AuthController::class, 'blockUser'])->name('users.blockUser');
    Route::get('/updateUser/{user}', [AuthController::class, 'updateUser'])->name('users.updateUser');
    Route::delete('/deleteUser/{user}', [AuthController::class, 'deleteUser'])->name('users.deleteUser');

    Route::get('/showUserPermissions', [AuthController::class, 'showUserPermissions'])->name('users.showUserPermissions');
    Route::get('/assignPermitionsToUser', [AuthController::class, 'assignPermitionsToUser'])->name('users.assignPermitionsToUser');
    Route::post('/storeAssignPermitionsToUser', [AuthController::class, 'storeAssignPermitionsToUser'])->name('users.storeAssignPermitionsToUser');
    Route::get('/editUserPermissions/{user}/edit', [AuthController::class, 'editUserPermissions'])->name('users.editUserPermissions');
    Route::delete('/revokeAllUserPermissions/{user}', [AuthController::class, 'revokeAllUserPermissions'])->name('users.revokeAllUserPermissions');
    Route::delete('/deleteUserPermition/{user}/deletePermition/{permission}', [AuthController::class, 'deleteUserPermition'])->name('users.deleteUserPermition');
    Route::put('/updateUserPermissions/{user}/permissions', [AuthController::class, 'updateUserPermissions'])->name('users.updateUserPermissions');
    Route::put('/saveUpdatedUser/{user}', [AuthController::class, 'saveUpdatedUser'])->name('users.saveUpdatedUser');



    //Reset Password
    Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
    Route::post('/forgot-password', [ResetPasswordController::class, 'passwordEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'passwordReset'])->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'passwordUpdate'])->name('password.update');

    //Languages Switcher
    Route::get('/language/{locale}', [LanguageController::class, 'switch'])->name('language.switch');

    //Send The clicked version to display it in a modal
    Route::get('/api/version/{id}', function ($id) {
        $version = \App\Models\Version::findOrFail($id);
        return response()->json([
            'numero' => $version->numero,
            'date' => $version->date->format('d/m/Y'),
            'description' => $version->description,
        ]);
    });

    Route::get('/DocumentEtat', [EtatController::class, 'index'])->name('etats.index');

    //Logs
    Route::get('/showUsersLog', [LogController::class, 'showUsersLog'])->name('logs.showUsersLog');


    Route::get('/About', function () {
        return view('about.about');
    })->name('about.about');


    //notification
    Route::put('/markAsRead/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::delete('/notifications/{notification}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
    // Route::get('/notifications/load-more', [NotificationController::class, 'loadMore'])->name('notifications.loadMore');

    Route::get('/notifications/load', function () {
        $notifications = \App\Models\Notification::where('user_id', auth()->id())
            ->latest()
            ->paginate(5);

        $notifications->getCollection()->transform(function ($notification) {
            $notification->created_at_diff = $notification->created_at->diffForHumans();
            return $notification;
        });

        return response()->json($notifications);
    });

    Route::get('/Documentation',function(){
        return view('documentation');
    })->name('documentation');

    Route::get('/Contact', function(){
        return view('contact');
    })->name('contact');

});
