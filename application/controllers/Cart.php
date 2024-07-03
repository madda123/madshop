<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $is_login = $this->session->userdata('is_login');
        $this->id = $this->session->userdata('id');

        if (! $is_login) {
            redirect(base_url());
            return;
        }
    }

    public function index() 
    {
        $data['title'] = 'Keranjang Belanja';
        $data['content']    = $this->cart->select(
            ['cart.id', 'cart.qty', 'cart.subtotal', 'product.title', 'product.image', 'product.price',]
        )
            ->join('product')
            ->where('cart.id_user', $this->id)
            ->get();
        $data['page'] = 'pages/cart/index';

        return $this->view($data);
    }

    public function add()
    {
        // Jika tidak ada POST data, redirect ke halaman utama
        if (!$_POST  || $this->input->post('qty') < 1) {
            $this->session->set_flashdata('error', 'Oops! Jumlah produk tidak boleh kosong');
            redirect(base_url());
        }

        // Ambil input dari POST data
        $input = (object) $this->input->post(null, true);

        // Inisialisasi tabel product
        $this->cart->table = 'product';

        // Ambil detail produk berdasarkan id_product
        $product = $this->cart->where('id', $input->id_product)->first();

        // Jika produk tidak ditemukan, redirect dengan pesan error
        if (!$product) {
            $this->session->set_flashdata('error', 'Produk tidak ditemukan.');
            redirect(base_url(''));
        }

        // Hitung subtotal
        $subtotal = $product->price * $input->qty;

        // Ambil item keranjang berdasarkan id_product dan id_user
        $this->cart->table = 'cart'; // Pastikan tabel cart sudah diset
        $cart = $this->cart->where('id_product', $input->id_product)
                        ->where('id_user', $this->id)
                        ->first();

        // Jika item sudah ada di keranjang, update jumlah dan subtotal
        if ($cart) {
            $data = [
                'qty'      => $cart->qty + $input->qty,
                'subtotal' => $cart->subtotal + $subtotal
            ];

            if ($this->cart->where('id', $cart->id)->update($data)) {
                $this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Oops! Terjadi kesalahan.');
            }

            redirect(base_url(''));
        }

        // Jika item belum ada di keranjang, tambahkan item baru
        $data = [
            'id_user'    => $this->id,
            'id_product' => $input->id_product,
            'qty'        => $input->qty,
            'subtotal'   => $subtotal
        ];

        if ($this->cart->create($data)) {
            $this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi kesalahan.');
        }

        redirect(base_url(''));
    }

    public function update($id)
    {
        if (!$_POST || $this->input->post('qty') < 1) {
            $this->session->set_flashdata('error', 'Jumlah produk tidak boleh kosong!');
            redirect(base_url('cart/index'));
        }
        
        $data['content'] = $this->cart->where('id', $id)->first();
        
        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Data tidak ditemukan!');
            redirect(base_url('cart/index'));
        }
        
        $data['input'] = (object) $this->input->post(null, true);
        $this->cart->table = 'product';
        $product = $this->cart->where('id', $data['content']->id_product)->first();
        $subtotal = $data['input']->qty * $product->price;
        $cart = [
            'qty' => $data['input']->qty,
            'subtotal' => $subtotal
        ];

        $this->cart->table = 'cart';
        if ($this->cart->where('id', $id)->update($cart)) {
            $this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi kesalahan.');
        }

        redirect(base_url('/cart/index'));

    }

    public function delete ($id) 
    {
        if (!$_POST) {
            redirect(base_url('cart/index'));
        }

        if (! $this->cart->where('id', $id)->first()) {
            $this->session->set_flashdata('warning', 'Maaf, data tidak ditemukan!');
            redirect(base_url('cart/index'));
        }

        if ($this->cart->where('id', $id)->delete()) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus!');
        }
        redirect(base_url('cart/index'));
    }


}
