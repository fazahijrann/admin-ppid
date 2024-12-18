<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbGenerator;


// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbGenerator $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Pemohon
Breadcrumbs::for('pemohon.index', function (BreadcrumbGenerator $trail) {
    $trail->parent('dashboard');
    $trail->push('Pemohon Informasi', route('pemohon.index'));
});
Breadcrumbs::for('pemohon.create', function (BreadcrumbGenerator $trail) {
    $trail->parent('pemohon.index');
    $trail->push('Tambah Pemohon');
});
Breadcrumbs::for('pemohon.edit', function (BreadcrumbGenerator $trail, $pemohon) {
    $trail->parent('pemohon.index');
    $trail->push('Edit Pemohon', route('pemohon.edit', $pemohon));
});

// Permohonan Informasi
Breadcrumbs::for('permohonan.index', function (BreadcrumbGenerator $trail) {
    $trail->parent('dashboard');
    $trail->push('Permohonan Informasi', route('permohonan.index'));
});
Breadcrumbs::for('permohonan.create', function (BreadcrumbGenerator $trail) {
    $trail->parent('permohonan.index');
    $trail->push('Tambah Permohonan');
});
Breadcrumbs::for('permohonan.show', function (BreadcrumbGenerator $trail, $permohonan) {
    $trail->parent('permohonan.index');
    $trail->push('Detail Permohonan', route('permohonan.show', $permohonan));
});

// Keberatan Informasi
Breadcrumbs::for('keberatan.index', function (BreadcrumbGenerator $trail) {
    $trail->parent('dashboard');
    $trail->push('Keberatan Informasi', route('keberatan.index'));
});
Breadcrumbs::for('keberatan.create', function (BreadcrumbGenerator $trail) {
    $trail->parent('keberatan.index');
    $trail->push('Tambah Keberatan');
});
Breadcrumbs::for('keberatan.show', function (BreadcrumbGenerator $trail, $keberatan) {
    $trail->parent('keberatan.index');
    $trail->push('detail Keberatan', route('keberatan.show', $keberatan));
});

// Riwayat Permohonan
Breadcrumbs::for('riwayatPermohonan', function (BreadcrumbGenerator $trail) {
    $trail->parent('dashboard');
    $trail->push('Riwayat Permohonan', route('riwayatPermohonan'));
});

// Riwayat Keberatan
Breadcrumbs::for('riwayatKeberatan', function (BreadcrumbGenerator $trail) {
    $trail->parent('dashboard');
    $trail->push('Riwayat Keberatan', route('riwayatKeberatan'));
});

// Profile
Breadcrumbs::for('profile.edit', function (BreadcrumbGenerator $trail) {
    $trail->parent('dashboard');
    $trail->push('Edit Profile', route('profile.edit'));
});

// Kelola Petugas PPID
Breadcrumbs::for('petugasppid.index', function (BreadcrumbGenerator $trail) {
    $trail->parent('dashboard');
    $trail->push('Kelola Petugas PPID', route('petugasppid.index'));
});
Breadcrumbs::for('petugasppid.create', function (BreadcrumbGenerator $trail) {
    $trail->parent('petugasppid.index');
    $trail->push('Tambah Petugas');
});
Breadcrumbs::for('petugasppid.edit', function (BreadcrumbGenerator $trail, $petugasppid) {
    $trail->parent('petugasppid.index');
    $trail->push('Edit Petugas', route('petugasppid.edit', $petugasppid));
});

// Kelola Pejabat PPID
Breadcrumbs::for('pejabatppid.index', function (BreadcrumbGenerator $trail) {
    $trail->parent('dashboard');
    $trail->push('Kelola Pejabat PPID', route('pejabatppid.index'));
});
Breadcrumbs::for('pejabatppid.create', function (BreadcrumbGenerator $trail) {
    $trail->parent('pejabatppid.index');
    $trail->push('Tambah Pejabat');
});
Breadcrumbs::for('pejabatppid.edit', function (BreadcrumbGenerator $trail, $pejabatppid) {
    $trail->parent('pejabatppid.index');
    $trail->push('Edit Pejabat', route('pejabatppid.edit', $pejabatppid));
});
