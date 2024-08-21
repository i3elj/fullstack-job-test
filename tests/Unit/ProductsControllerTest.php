<?php

test("adding a new product", function () {
    $res = $this->withCookie("auth", "secret")->post("/products", [
        "name" => "strawberry",
        "category" => "fruit",
        "price" => "2.50",
    ]);

    $res->assertStatus(200)->assertExactJson([
        "success" => true,
        "msgs" => ["Item adicionado com sucesso"],
    ]);
});

test("adding a new product with missing fields", function () {
    $res = $this->withCookie("auth", "secret")->post("/products", [
        "name" => "",
        "category" => "fruit",
        "price" => "2.50",
    ]);

    $res->assertStatus(200)->assertJson([
        "success" => false,
        "msgs" => ["O nome do item não pode estar vazio"],
    ]);
});

test("trying to add a product without being authenticated", function () {
    $res = $this->post("/products", [
        "name" => "",
        "category" => "fruit",
        "price" => "2.50",
    ]);

    $res->assertStatus(302);
});
