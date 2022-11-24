<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ProductTest extends TestCase
{
  use WithoutMiddleware, WithFaker;
  
  protected function authenticatedUser(){
    $user       = User::where('role', trans('lang.admin_role'))->first();
    $activeUser = $this->actingAs($user);
}

     /** @test*/
    public function verify_that_the_products_routing_exists()
    {
        $this->authenticatedUser();
        $response = $this->call('GET', '/products');
        $response->assertStatus(200);
    }

    /** @test*/
    public function must_show_the_title_of_the_product_listing()
    {
        $this->authenticatedUser();
        $response = $this->get('/products');
        $response->assertSee(trans('lang.product_list'));
    }

     /** @test*/
     public function must_validate_required_field_to_register_a_product()
     {
      $this->withoutMiddleware();
      $user     = User::factory()->create();
      $response = $this->actingAs($user)
      ->postJson(route('products.store'), [
          'name' => '',
          'price' => '',
          'qty' => '',
      ]);
      $response->assertStatus(
          Response::HTTP_UNPROCESSABLE_ENTITY
      );
      $response->assertJsonValidationErrors('name');
      $response->assertJsonValidationErrors('price');
      $response->assertJsonValidationErrors('qty');

     }
    /** @test*/
    public function must_register_a_product_successfull()
    {
      $this->withoutMiddleware();
      $user     = User::factory()->create();
      $response = $this->actingAs($user)
      ->postJson(route('products.store'), [
          'name'   => $this->faker->word(),
          'price'  => $this->faker->numberBetween($min = 1, $max = 5000),
          'qty'    => $this->faker->randomNumber(3, false),
      ]);
      $response = $this->call('GET', '/products');
      $response->assertStatus(200);

    }

}
