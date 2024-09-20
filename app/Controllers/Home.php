<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {

        if ($this->request->getPost('search')) {

            $search = addslashes(trim(htmlspecialchars($this->request->getPost('search'))));

            $games[] = [
                'category' => 'Pencarian',
                'games' => $this->M_Base->data_like('games', 'games', $search),
            ];
        } else {
            $games = [];
            foreach ($this->M_Base->all_data_order('category', 'sort') as $category) {
                $find_games = array_reverse($this->M_Base->all_data_order('games', 'sort'));

                if (count($find_games) !== 0) {

                    $games_x = [];
                    foreach (($find_games) as $x) {
                        if ($x['category'] == $category['category']) {
                            $games_x[] = $x;
                        }
                    }

                    $games[] = [
                        'category' => $category['category'],
                        'games' => $games_x,
                    ];
                }
            }

            $search = '';
        }



        $data = array_merge($this->base_data, [
            'title' => $this->base_data['web']['name'],
            'games' => $games,
            'flashsale' => $this->M_Base->join_table_3('flashsale', 'games', 'product', 'id', 'games_id', 'product_id', 'flashsale.*, games.image AS game_image, games.slug AS game_slug, games.games AS game_game, product.product, product.price, product.limitflashsale, product.flashsale_part, product.discount_price, flashsale.image'),
            'banner' => $this->M_Base->all_data('banner', 7),
            'search' => $search,
            'method' => $this->M_Base->data_where('method', 'status', 'On'),
            'expired' => $this->M_Base->u_get('flashsale_expired'),
            // 'post' => $this->M_Base->all_data('post', 10),
            'post' => $this->M_Base->all_data('post'),
            'popup' => [
                'title' => $this->M_Base->u_get('popup_title'),
                'desc' => $this->M_Base->u_get('popup_desc'),
                'date' => $this->M_Base->u_get('popup_date'),
                'status' => $this->M_Base->u_get('popup_status'),
                'image' => $this->M_Base->u_get('popup_image'),
            ],
        ]);


        return view('/Home/index', $data);
    }
    public function search()
    {
        $searchQuery = $this->request->getPost('searchQuery');
        $games = $this->M_Base->data_like('games', 'games', $searchQuery, ['status' => 'On'], 'games ASC');
        $searchResultsHtml = '';
        $lastCategory = '';
        foreach ($games as $game) {
            if ($game['status'] == 'On') {
                if ($game['category'] !== $lastCategory) {
                    $searchResultsHtml .= '<div class="category-item p-3 ml-2 col-12" hidden><h6 class="mb-0" style="text-transform: uppercase;" hidden>' . $game['category'] . '</h6></div>';
                    $lastCategory = $game['category'];
                }
                $searchResultsHtml .= '<hr class="dropdown-divider"hidden> <li class="game-item"><a class="dropdown-item" href="' . base_url() . '/games/' . $game['slug'] . '">
            <div class="row">
                <div class="col-3">
                    <img src="' . base_url() . '/assets/images/games/' . $game['image'] . '" alt="' . $game['games'] . '" width="60" class="img-fluid">
                </div>
                <div class="col-9 "style="color: #fff;">
                    <div class="row">
                        <div class="col-md-12">
                            <b>' . $game['games'] . '</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <small style="color:var(--warna_text) !important;">Instant</small>
                        </div>
                    </div>
                </div>
            </div>
        </a></li><hr class="dropdown-divider">';
            }
        }
        echo $searchResultsHtml;
    }

    public function load_more()
    {
        $page = $this->request->getPost('page');
        $limit = 10; // Batas data per halaman
        $offset = ($page - 1) * $limit;

        // Ambil data game dari database sesuai offset dan limit
        $games = $this->gameModel->getGames($limit, $offset); // Sesuaikan dengan modelmu

        // Tampilkan data game dalam bentuk view tanpa layout
        foreach ($games as $game) {
            if ($game['status'] == 'On') {
                echo '
                <div style="margin-bottom: 30px;display: flex;" class="col-sm-3 col-lg-2 col-4 text-center">
                    <div class="card mb-3" style="">
                        <a href="' . base_url() . 'games/' . $game['slug'] . '" class="product_list">
                            <div style="margin-bottom: 0px;" class="card">
                                <img src="' . base_url() . '/assets/images/games/' . $game['image'] . '" class="img-fluid img-games" style="border-radius: 15px;">
                                <div class="card-title2" style="font-weight:bold;">' . $game['games'] . '</div>
                            </div>
                        </a>
                    </div>
                </div>';
            }
        }
    }
}
