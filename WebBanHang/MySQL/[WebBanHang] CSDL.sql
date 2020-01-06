CREATE DATABASE WebBanHang;

USE WebBanHang;

ALTER DATABASE WebBanHang
DEFAULT CHARACTER SET utf8 COLLATE utf8_vietnamese_ci;

CREATE TABLE SanPham (
	MaSP varchar(10) NOT NULL,
	TenSP varchar(100),
	ThongTin varchar(255),
	GiaTien int,
	SoLuongTonKho int,
	MaLoaiSP varchar(10),
	AnhMinhHoa varchar(255),
	TrangThai bit DEFAULT 1 NOT NULL,
	PRIMARY KEY (MaSP)
) ENGINE = INNODB;

CREATE TABLE LoaiSanPham (
	MaLoaiSP varchar(10) NOT NULL,
	TenLoaiSP varchar(100) NOT NULL,
	TrangThai bit DEFAULT 1 NOT NULL,
	PRIMARY KEY (MaLoaiSP)
) ENGINE = INNODB;

CREATE TABLE TaiKhoan (
	TenTaiKhoan varchar(20) NOT NULL,
	MatKhau varchar(20) NOT NULL,
	Email varchar(100),
	SDT varchar(20),
	DiaChi varchar(255),
	HoTen varchar(100),
	LaAdmin bit DEFAULT 0 NOT NULL,
	AnhDaiDien varchar(255),
	TrangThai bit DEFAULT 1 NOT NULL,
	PRIMARY KEY (TenTaiKhoan)
) ENGINE = INNODB;

CREATE TABLE GioHang (
	TenTaiKhoan varchar(20) NOT NULL,
	MaSP varchar(10) NOT NULL,
	SoLuong int DEFAULT 1 NOT NULL,
	CONSTRAINT PK_GioHang PRIMARY KEY (TenTaiKhoan, MaSP)
) ENGINE = INNODB;

CREATE TABLE HoaDon (
	MaHD varchar(10) NOT NULL,
	TenTaiKhoan varchar(20) NOT NULL,
	NgayMua datetime,
	DiaChiGiaoHang varchar(255),
	SDTGiaoHang varchar(20),
	TongTien int,
	TrangThai bit DEFAULT 1 NOT NULL,
	PRIMARY KEY (MaHD)
) ENGINE = INNODB;

CREATE TABLE CTHoaDon (
	MaHD varchar(10) NOT NULL,
	MaSP varchar(10) NOT NULL,
	SoLuong int,
	DonGia int,
	CONSTRAINT PK_CTHoaDon PRIMARY KEY (MaHD, MaSP)
) ENGINE = INNODB;

ALTER TABLE SanPham
ADD FOREIGN KEY (MaLoaiSP) REFERENCES LoaiSanPham(MaLoaiSP);

ALTER TABLE GioHang
ADD FOREIGN KEY (MaSP) REFERENCES SanPham(MaSP);

ALTER TABLE GioHang
ADD FOREIGN KEY (TenTaiKhoan) REFERENCES TaiKhoan(TenTaiKhoan);

ALTER TABLE HoaDon
ADD FOREIGN KEY (TenTaiKhoan) REFERENCES TaiKhoan(TenTaiKhoan);

ALTER TABLE CTHoaDon
ADD FOREIGN KEY (MaHD) REFERENCES HoaDon(MaHD);

ALTER TABLE CTHoaDon
ADD FOREIGN KEY (MaSP) REFERENCES SanPham(MaSP);

INSERT INTO TaiKhoan (TenTaiKhoan, MatKhau, Email, SDT, DiaChi, HoTen, LaAdmin, AnhDaiDien, TrangThai) VALUES ('admin', 'admin', 'admin@webbanhang.com', '01234567890', 'Tp Hồ Chí Minh', 'Nguyễn Văn Ad Min', 1, NULL, 1);
INSERT INTO TaiKhoan (TenTaiKhoan, MatKhau, Email, SDT, DiaChi, HoTen, LaAdmin, AnhDaiDien, TrangThai) VALUES ('test1', '123456', 'test@gmail.com', '0905123456', 'Hà Nội', 'Nguyễn Văn A', 0, NULL, 1);
INSERT INTO TaiKhoan (TenTaiKhoan, MatKhau, Email, SDT, DiaChi, HoTen, LaAdmin, AnhDaiDien, TrangThai) VALUES ('customer', '123456', 'customer@gmail.com', '0987654321', 'Huế', 'Trần Thị B', 0, NULL, 1);

INSERT INTO LoaiSanPham (MaLoaiSP, TenLoaiSP, TrangThai) VALUES ('LSP001', 'Sách giáo khoa', 1);
INSERT INTO LoaiSanPham (MaLoaiSP, TenLoaiSP, TrangThai) VALUES ('LSP002', 'Sách tham khảo', 1);
INSERT INTO LoaiSanPham (MaLoaiSP, TenLoaiSP, TrangThai) VALUES ('LSP003', 'Sách nước ngoài', 1);
INSERT INTO LoaiSanPham (MaLoaiSP, TenLoaiSP, TrangThai) VALUES ('LSP004', 'Báo & Tạp chí', 1);
INSERT INTO LoaiSanPham (MaLoaiSP, TenLoaiSP, TrangThai) VALUES ('LSP005', 'Tiểu thuyết & Tự truyện', 1);
INSERT INTO LoaiSanPham (MaLoaiSP, TenLoaiSP, TrangThai) VALUES ('LSP006', 'Khác', 1);

INSERT INTO SanPham (MaSP, TenSP, ThongTin, GiaTien, SoLuongTonKho, MaLoaiSP, AnhMinhHoa, TrangThai) VALUES ('SP001', 'Tuổi trẻ đáng giá bao nhiêu', 'Rosie Nguyễn', 45000, 40, 'LSP005', 'SP001.jpg', 1);
INSERT INTO SanPham (MaSP, TenSP, ThongTin, GiaTien, SoLuongTonKho, MaLoaiSP, AnhMinhHoa, TrangThai) VALUES ('SP002', 'Bứt phá điểm thi THPT Quốc gia môn Hóa học', 'Nguyễn Đức Dũng', 51000, 15, 'LSP002', 'SP002.jpg', 1);
INSERT INTO SanPham (MaSP, TenSP, ThongTin, GiaTien, SoLuongTonKho, MaLoaiSP, AnhMinhHoa, TrangThai) VALUES ('SP003', 'Khéo ăn khéo nói sẽ có được thiên hạ', 'Trác Nhã', 59000, 29, 'LSP006', 'SP003.jpg', 1);
INSERT INTO SanPham (MaSP, TenSP, ThongTin, GiaTien, SoLuongTonKho, MaLoaiSP, AnhMinhHoa, TrangThai) VALUES ('SP004', 'Nhà giả kim', 'Paulo Coelho', 53000, 1, 'LSP003', 'SP004.jpg', 1);
INSERT INTO SanPham (MaSP, TenSP, ThongTin, GiaTien, SoLuongTonKho, MaLoaiSP, AnhMinhHoa, TrangThai) VALUES ('SP005', 'Để yên cho bác sĩ "Hiền"', 'BS. Ngô Đức Hùng', 52000, 36, 'LSP004', 'SP005.jpg', 1);
INSERT INTO SanPham (MaSP, TenSP, ThongTin, GiaTien, SoLuongTonKho, MaLoaiSP, AnhMinhHoa, TrangThai) VALUES ('SP006', 'Mình là cá, việc của mình là bơi ', 'Takeshi Furukawa', 57000, 9, 'LSP003', 'SP006.jpg', 1);
INSERT INTO SanPham (MaSP, TenSP, ThongTin, GiaTien, SoLuongTonKho, MaLoaiSP, AnhMinhHoa, TrangThai) VALUES ('SP007', 'Đời ngắn đừng ngủ dài', 'Robin Sharma', 42000, 7, 'LSP003', 'SP007.jpg', 1);
INSERT INTO SanPham (MaSP, TenSP, ThongTin, GiaTien, SoLuongTonKho, MaLoaiSP, AnhMinhHoa, TrangThai) VALUES ('SP008', 'Bứt phá điểm thi THPT Quốc gia môn Toán', 'ThS. Đỗ Đường Hiếu', 51000, 0, 'LSP002', 'SP008.jpg', 1);
INSERT INTO SanPham (MaSP, TenSP, ThongTin, GiaTien, SoLuongTonKho, MaLoaiSP, AnhMinhHoa, TrangThai) VALUES ('SP009', 'Cà phê cùng Tony ', 'Tony Buổi Sáng', 62000, 18, 'LSP006', 'SP009.jpg', 1);
INSERT INTO SanPham (MaSP, TenSP, ThongTin, GiaTien, SoLuongTonKho, MaLoaiSP, AnhMinhHoa, TrangThai) VALUES ('SP010', 'Em sẽ đến cùng cơn mưa', 'Ichikawa Takuji', 56000, 64, 'LSP005', 'SP010.jpg', 1);
INSERT INTO SanPham (MaSP, TenSP, ThongTin, GiaTien, SoLuongTonKho, MaLoaiSP, AnhMinhHoa, TrangThai) VALUES ('SP011', 'Quẳng gánh lo đi mà vui sống', 'Dale Carnegie', 45000, 120, 'LSP006', 'SP011.jpg', 1);
INSERT INTO SanPham (MaSP, TenSP, ThongTin, GiaTien, SoLuongTonKho, MaLoaiSP, AnhMinhHoa, TrangThai) VALUES ('SP012', 'Mình nói gì khi nói về hạnh phúc?', 'Rosie Nguyễn', 36000, 46, 'LSP005', 'SP012.jpg', 1);