<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewMoviesTest extends TestCase
{
   public function the_main_page_show_correct_info() {
    $respond =  $this->get(route('movies.index'));
    $respond->assertSuccessful();
    $respond->assertSee('Popular Movies');
    
   }
}
