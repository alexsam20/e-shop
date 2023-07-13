<?php

namespace shop;

class Pagination
{
    public mixed $currentPage;
    public int $perpage = 0;
    public int $total = 0;
    public int|float $countPages = 0;
    public string $uri = '';

    public function __construct(int $page, int $perpage, int $total)
    {
        $this->perpage = $perpage;
        $this->total = $total;
        $this->countPages = $this->getCountPages();
        $this->currentPage = $this->getCurrentPage($page);
        $this->uri = $this->getParams();
    }

    public function getHtml(): string
    {
        $back = null; // link BACK
        $forward = null; // link FORWARD
        $startpage = null; // link TO THE BEGINING
        $endpage = null; // link IN THE END
        $page2left = null; // SECOND PAGE FROM LEFT
        $page1left = null; // FIRST PAGE FROM LEFT
        $page2right = null; // SECOND PAGE FROM RIGHT
        $page1right = null; // FIRST PAGE FROM RIGHT

        // $back &lt;
        if ($this->currentPage > 1) {
            $back = "<li class='page-item'><a class='page-link' href='" . $this->getLink($this->currentPage - 1) . "'>" . ___('tpl_pagination_previous_page') . "</a></li>";
        }
        // $forward &gt;
        if ($this->currentPage < $this->countPages) {
            $forward = "<li class='page-item'><a class='page-link' href='" . $this->getLink($this->currentPage + 1) . "'>" . ___('tpl_pagination_next_page') . "</a></li>";
        }
        // $startpage &laquo;
        if ($this->currentPage > 3) {
            $startpage = "<li class='page-item'><a class='page-link' href='" . $this->getLink(1) . "'>" . ___('tpl_pagination_to_beginning') . "</a></li>";
        }
        // $endpage &raquo;
        if ($this->currentPage < ($this->countPages - 2)) {
            $endpage = "<li class='page-item'><a class='page-link' href='" . $this->getLink($this->countPages) . "'>" . ___('tpl_pagination_to_end') . "</a></li>";
        }
        // $page2left
        if ($this->currentPage - 2 > 0) {
            $page2left = "<li class='page-item'><a class='page-link' href='" . $this->getLink($this->currentPage - 2) . "'>" . ($this->currentPage - 2) . "</a></li>";
        }
        // $page1left
        if ($this->currentPage - 1 > 0) {
            $page1left = "<li class='page-item'><a class='page-link' href='" . $this->getLink($this->currentPage - 1) . "'>" . ($this->currentPage - 1) . "</a></li>";
        }
        // $page1right
        if ($this->currentPage + 1 <= $this->countPages) {
            $page1right = "<li class='page-item'><a class='page-link' href='" . $this->getLink($this->currentPage + 1) . "'>" . ($this->currentPage + 1) . "</a></li>";
        }
        // $page2right
        if ($this->currentPage + 2 <= $this->countPages) {
            $page2right = "<li class='page-item'><a class='page-link' href='" . $this->getLink($this->currentPage + 2) . "'>" . ($this->currentPage + 2) . "</a></li>";
        }
        return '<nav aria-label="Page navigation example"><ul class="pagination">' . $startpage . $back . $page2left . $page1left . '<li class="page-item active"><a class="page-link">' . $this->currentPage . '</a></li>' . $page1right . $page2right . $forward . $endpage . '</ul></nav>';
    }

    public function getLink($page): string
    {
        if ($page == 1) {
            return rtrim($this->uri, '?&');
        }
        if (str_contains($this->uri, '&')) {
            return "{$this->uri}page={$page}";
        }
        if (str_contains($this->uri, '?')) {
            return "{$this->uri}page={$page}";
        }

        return "{$this->uri}?page={$page}";
    }

    public function __toString()
    {
        return $this->getHtml();
    }

    private function getCountPages(): float|int
    {
        return ceil($this->total / $this->perpage) ?: 1;
    }

    private function getCurrentPage($page): mixed
    {
        if (!$page || $page < 1) $page = 1;
        if ($page > $this->countPages) $page = $this->countPages;
        return $page;
    }

    public function getStart()
    {
        return ($this->currentPage - 1) * $this->perpage;
    }

    private function getParams()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        $uri = $url[0];
        if (isset($url[1]) && $url[1] != '') {
            $uri .= '?';
            $params = explode('&', $url[1]);
            foreach ($params as $param) {
                if (!preg_match("#page=#", $param)) $uri .= "{$param}&";
            }
        }

        return $uri;
    }
}