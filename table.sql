create database universitas;
use universitas;

create table users(
    id int not null primary key auto_increment,
    username varchar(64),
    password varchar(255)
);

create table fakultas(
    id_fakultas varchar(12) primary key,
    nama_fakultas varchar(64)
);

create table jurusan(
    id_jurusan varchar(12) primary key,
    nama_jurusan varchar(64),
    id_fakultas varchar(12),
    foreign key (id_fakultas) references fakultas(id_fakultas)
) create table mahasiswa(
    npm varchar(12) primary key,
    nama_mahasiswa varchar(64),
    asal varchar(64),
    id_jurusan varchar(12),
    foreign key(id_jurusan) references jurusan(id_jurusan)
);

create table dosen(
    nip varchar(12) primary key,
    nama_dosen varchar(64),
    asal varchar(64),
    id_jurusan varchar(12),
    foreign key(id_jurusan) references jurusan(id_jurusan)
);

create table matkul(
    id_matkul varchar(12) primary key,
    nama_matkul varchar(64),
    sks varchar(2),
    id_jurusan varchar(12),
    foreign key(id_jurusan) references jurusan(id_jurusan)
);