<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

// dashboard pages
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('pages.dashboard.ecommerce', ['title' => 'E-commerce Dashboard']);
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // CSM Administrator Routes
    Route::middleware(['role:CSM Administrator'])->prefix('csm-admin')->name('csm.')->group(function () {

        // Master Menu
        Route::prefix('master')->name('master.')->group(function () {
            // General
            Route::prefix('general')->name('general.')->group(function () {
                Route::view('currency', 'pages.csm-admin.general.currency')->name('currency');
                Route::view('branch', 'pages.csm-admin.general.branch')->name('branch');
                Route::view('bank', 'pages.csm-admin.general.bank')->name('bank');
                Route::view('class-of-business', 'pages.csm-admin.general.class-of-business')->name('class-of-business');
                Route::view('business', 'pages.csm-admin.general.business')->name('business');
                Route::view('memorial-code-list', 'pages.csm-admin.general.memorial-code-list')->name('memorial-code-list');
                Route::view('segment', 'pages.csm-admin.general.segment')->name('segment');
                Route::view('chart-of-account', 'pages.csm-admin.general.chart-of-account')->name('chart-of-account');
                Route::view('journal-template', 'pages.csm-admin.general.journal-template')->name('journal-template');
            });

            // Liability
            Route::prefix('liability')->name('liability.')->group(function () {
                Route::view('portfolio-and-assumption', 'pages.csm-admin.liability.portfolio-and-assumption')->name('portfolio');
                Route::view('discount-rate-and-liquidity-premium', 'pages.csm-admin.liability.discount-rate-and-liquidity-premium')->name('discount-rate');
                Route::view('lapse-ratio', 'pages.csm-admin.liability.lapse-ratio')->name('lapse-ratio');
                Route::view('opex-allocation', 'pages.csm-admin.liability.opex-allocation')->name('opex-allocation');
                Route::view('accident-rate', 'pages.csm-admin.liability.accident-rate')->name('accident-rate');
                Route::view('inflation-rate', 'pages.csm-admin.liability.inflation-rate')->name('inflation-rate');
                Route::view('npr-rate', 'pages.csm-admin.liability.npr-rate')->name('npr-rate');
                Route::view('risk-value-matrix', 'pages.csm-admin.liability.risk-value-matrix')->name('risk-value-matrix');
            });
        });

        // Data Management Menu
        Route::prefix('data-management')->name('data-management.')->group(function () {
            // Tools
            Route::prefix('tools')->name('tools.')->group(function () {
                Route::view('data-quality-control', 'pages.csm-admin.data-management.tools.data-quality-control')->name('data-quality-control');
                Route::view('journal-export', 'pages.csm-admin.data-management.tools.journal-export')->name('journal-export');
                Route::view('coa-mapping', 'pages.csm-admin.data-management.tools.coa-mapping')->name('coa-mapping');
                Route::view('memorial-exclusion', 'pages.csm-admin.data-management.tools.memorial-exclusion')->name('memorial-exclusion');
            });

            Route::view('template-data-migration', 'pages.csm-admin.data-management.template-data-migration')->name('template-data-migration');
            Route::view('data-staging', 'pages.csm-admin.data-management.data-staging')->name('data-staging');
        });

        // Report Menu
        Route::prefix('report')->name('report.')->group(function () {
            // Subledger Report
            Route::prefix('subledger')->name('subledger.')->group(function () {
                Route::view('insurance-contract-production-report', 'pages.csm-admin.report.subledger.insurance-contract-production-report')->name('insurance-contract-production-report');
                Route::view('insurance-contract-receipt', 'pages.csm-admin.report.subledger.insurance-contract-receipt')->name('insurance-contract-receipt');
                Route::view('insurance-service-expense-incurred-claims-report', 'pages.csm-admin.report.subledger.insurance-service-expense-incurred-claims-report')->name('insurance-service-expense-incurred-claims-report');
                Route::view('insurance-service-expense-claim-payment', 'pages.csm-admin.report.subledger.insurance-service-expense-claim-payment')->name('insurance-service-expense-claim-payment');
                Route::view('reinsurance-contract-production', 'pages.csm-admin.report.subledger.reinsurance-contract-production')->name('reinsurance-contract-production');
                Route::view('reins-contract-payment-report', 'pages.csm-admin.report.subledger.reins-contract-payment-report')->name('reins-contract-payment-report');
                Route::view('incurred-claim-ceded-to-reinsurer', 'pages.csm-admin.report.subledger.incurred-claim-ceded-to-reinsurer')->name('incurred-claim-ceded-to-reinsurer');
                Route::view('incurred-claim-ceded-to-reinsurer-receipt', 'pages.csm-admin.report.subledger.incurred-claim-ceded-to-reinsurer-receipt')->name('incurred-claim-ceded-to-reinsurer-receipt');
                Route::view('outstanding-claim', 'pages.csm-admin.report.subledger.outstanding-claim')->name('outstanding-claim');
            });

            // Financial Report
            Route::prefix('financial')->name('financial.')->group(function () {
                Route::view('chart-of-account', 'pages.csm-admin.report.financial.chart-of-account')->name('chart-of-account');
                Route::view('journal-template-report', 'pages.csm-admin.report.financial.journal-template-report')->name('journal-template-report');
                Route::view('transaction-journal', 'pages.csm-admin.report.financial.transaction-journal')->name('transaction-journal');
                Route::view('trial-balance', 'pages.csm-admin.report.financial.trial-balance')->name('trial-balance');
                Route::view('general-ledger', 'pages.csm-admin.report.financial.general-ledger')->name('general-ledger');
                Route::view('statements-of-financial-position', 'pages.csm-admin.report.financial.statements-of-financial-position')->name('statements-of-financial-position');
                Route::view('statements-of-profit-or-loss', 'pages.csm-admin.report.financial.statements-of-profit-or-loss')->name('statements-of-profit-or-loss');
                Route::view('profit-or-loss-per-portfolio', 'pages.csm-admin.report.financial.profit-or-loss-per-portfolio')->name('profit-or-loss-per-portfolio');
                Route::view('opex-report', 'pages.csm-admin.report.financial.opex-report')->name('opex-report');
                Route::view('admin-fee', 'pages.csm-admin.report.financial.admin-fee')->name('admin-fee');
            });

            // Actuary Report
            Route::prefix('actuary')->name('actuary.')->group(function () {
                Route::view('portfolio-report', 'pages.csm-admin.report.actuary.portfolio-report')->name('portfolio-report');
                Route::view('ibnr-report', 'pages.csm-admin.report.actuary.ibnr-report')->name('ibnr-report');
                Route::view('lrc-paa-report', 'pages.csm-admin.report.actuary.lrc-paa-report')->name('lrc-paa-report');
                Route::view('lrc-paa-yearly-report', 'pages.csm-admin.report.actuary.lrc-paa-yearly-report')->name('lrc-paa-yearly-report');
                Route::view('lrc-paa-insurance-gpw-dac-report', 'pages.csm-admin.report.actuary.lrc-paa-insurance-gpw-dac-report')->name('lrc-paa-insurance-gpw-dac-report');
                Route::view('lrc-paa-ceded-to-ri-report', 'pages.csm-admin.report.actuary.lrc-paa-ceded-to-ri-report')->name('lrc-paa-ceded-to-ri-report');
                Route::view('lrc-paa-yearly-ceded-to-ri-report', 'pages.csm-admin.report.actuary.lrc-paa-yearly-ceded-to-ri-report')->name('lrc-paa-yearly-ceded-to-ri-report');
                Route::view('lrc-gmm-report', 'pages.csm-admin.report.actuary.lrc-gmm-report')->name('lrc-gmm-report');
                Route::view('lrc-gmm-yearly-report', 'pages.csm-admin.report.actuary.lrc-gmm-yearly-report')->name('lrc-gmm-yearly-report');
                Route::view('lrc-gmm-ceded-to-ri-engine-report', 'pages.csm-admin.report.actuary.lrc-gmm-ceded-to-ri-engine-report')->name('lrc-gmm-ceded-to-ri-engine-report');
                Route::view('lrc-gmm-reins-yearly-report', 'pages.csm-admin.report.actuary.lrc-gmm-reins-yearly-report')->name('lrc-gmm-reins-yearly-report');
                Route::view('opex-allocation-report', 'pages.csm-admin.report.actuary.opex-allocation-report')->name('opex-allocation-report');
                Route::view('profit-loss-per-policy-report', 'pages.csm-admin.report.actuary.profit-loss-per-policy-report')->name('profit-loss-per-policy-report');
                Route::view('lrc-movement-analysis', 'pages.csm-admin.report.actuary.lrc-movement-analysis')->name('lrc-movement-analysis');
            });

            // Disclosure
            Route::prefix('disclosure')->name('disclosure.')->group(function () {
                Route::view('disclosure-efcf-receivable', 'pages.csm-admin.report.disclosure.disclosure-efcf-receivable')->name('disclosure-efcf-receivable');
                Route::view('disclosure-acquisition-cost', 'pages.csm-admin.report.disclosure.disclosure-acquisition-cost')->name('disclosure-acquisition-cost');
                Route::view('disclosure-efcf-payable', 'pages.csm-admin.report.disclosure.disclosure-efcf-payable')->name('disclosure-efcf-payable');
                Route::view('disclosure-incurred-claims', 'pages.csm-admin.report.disclosure.disclosure-incurred-claims')->name('disclosure-incurred-claims');
                Route::view('disclosure-coa-to-payable-and-receivable', 'pages.csm-admin.report.disclosure.disclosure-coa-to-payable-and-receivable')->name('disclosure-coa-to-payable-and-receivable');
                Route::view('disclosure-lrc-paa', 'pages.csm-admin.report.disclosure.disclosure-lrc-paa')->name('disclosure-lrc-paa');
                Route::view('disclosure-lrc-gmm', 'pages.csm-admin.report.disclosure.disclosure-lrc-gmm')->name('disclosure-lrc-gmm');
                Route::view('disclosure-lic', 'pages.csm-admin.report.disclosure.disclosure-lic')->name('disclosure-lic');
            });

            // Regulatory Report
            Route::prefix('regulatory')->name('regulatory.')->group(function () {
                Route::view('ojk-report', 'pages.csm-admin.report.regulatory.ojk-report')->name('ojk-report');
                Route::view('template-mapping', 'pages.csm-admin.report.regulatory.template-mapping')->name('template-mapping');
                Route::view('results-of-insurance-services', 'pages.csm-admin.report.regulatory.results-of-insurance-services')->name('results-of-insurance-services');
                Route::view('total-sum-insured', 'pages.csm-admin.report.regulatory.total-sum-insured')->name('total-sum-insured');
                Route::view('lrc-amortization-period', 'pages.csm-admin.report.regulatory.lrc-amortization-period')->name('lrc-amortization-period');
                Route::view('reinsurance-contract-held', 'pages.csm-admin.report.regulatory.reinsurance-contract-held')->name('reinsurance-contract-held');
                Route::view('csm-roll-forward-report', 'pages.csm-admin.report.regulatory.csm-roll-forward-report')->name('csm-roll-forward-report');
            });
        });
    });

    // calender pages
    Route::get('/calendar', function () {
        return view('pages.calender', ['title' => 'Calendar']);
    })->name('calendar');
});

// profile pages
Route::get('/profile', function () {
    return view('pages.profile', ['title' => 'Profile']);
})->name('profile');

// form pages
Route::get('/form-elements', function () {
    return view('pages.form.form-elements', ['title' => 'Form Elements']);
})->name('form-elements');

// tables pages
Route::get('/basic-tables', function () {
    return view('pages.tables.basic-tables', ['title' => 'Basic Tables']);
})->name('basic-tables');

// pages

Route::get('/blank', function () {
    return view('pages.blank', ['title' => 'Blank']);
})->name('blank');

// error pages
Route::get('/error-404', function () {
    return view('pages.errors.error-404', ['title' => 'Error 404']);
})->name('error-404');

// chart pages
Route::get('/line-chart', function () {
    return view('pages.chart.line-chart', ['title' => 'Line Chart']);
})->name('line-chart');

Route::get('/bar-chart', function () {
    return view('pages.chart.bar-chart', ['title' => 'Bar Chart']);
})->name('bar-chart');


// authentication pages
Route::get('/signin', function () {
    return view('pages.auth.signin', ['title' => 'Sign In']);
})->name('signin');
Route::post('/signin', [AuthController::class, 'login'])->name('login.post');

Route::get('/signup', function () {
    return view('pages.auth.signup', ['title' => 'Sign Up']);
})->name('signup');

// ui elements pages
Route::get('/alerts', function () {
    return view('pages.ui-elements.alerts', ['title' => 'Alerts']);
})->name('alerts');

Route::get('/avatars', function () {
    return view('pages.ui-elements.avatars', ['title' => 'Avatars']);
})->name('avatars');

Route::get('/badge', function () {
    return view('pages.ui-elements.badges', ['title' => 'Badges']);
})->name('badges');

Route::get('/buttons', function () {
    return view('pages.ui-elements.buttons', ['title' => 'Buttons']);
})->name('buttons');

Route::get('/image', function () {
    return view('pages.ui-elements.images', ['title' => 'Images']);
})->name('images');

Route::get('/videos', function () {
    return view('pages.ui-elements.videos', ['title' => 'Videos']);
})->name('videos');






















