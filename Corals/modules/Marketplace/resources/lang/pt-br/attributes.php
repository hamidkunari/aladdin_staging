<?php

return [

    'attributes' => [
        'label' => 'Rótulo',
        'type' => 'Tipo',
        'required' => 'Requeridos',
        'use_as_filter' => 'Use como filtro',
        'order' => 'Ordem',
        'options' => 'Opções',
    ],
    'brand' => [
        'logo' => 'Logotipo',
        'name' => 'Nome',
        'slug' => 'Lesma',
        'products_count' => '# Produtos',
        'is_featured' => 'Destaque',
        'clear' => 'Limpar imagem em miniatura',
        'thumbnail' => 'Miniatura',
    ],
    'category' => [
        'name' => 'Nome',
        'slug' => 'Lesma',
        'parent_id' => 'Pai',
        'products_count' => '# Produtos',
        'parent_cat' => 'Categoria Parental',
        'is_featured' => 'Destaque',
        'description' => 'Descrição',
        'clear' => 'Limpar imagem em miniatura',
        'thumbnail' => 'Miniatura',
    ],
    'coupon' => [
        'code' => 'Código do cupom',
        'value' => 'Valor',
        'type' => 'Tipo',
        'type_option' => [
            'fixed' => 'Fixo',
            'percentage' => 'Percentagem',
        ],
        'status_options' => [
            'active' => 'Ativo',
            'pending' => 'Pendente',
            'expired' => 'Expirado',
        ],
        'start' => 'Começa em',
        'expiry' => 'Termina em',
        'min_cart_total' => 'Total mínimo do carrinho',
        'uses' => 'Usos',
        'users' => 'Comercial',
        'products' => 'Produtos',
        'coupon_code' => 'Digite seu código de cupom aqui',
        'max_discount_value' => 'Valor máximo de desconto',
    ],
    'order' => [
        'order_number' => 'Número do pedido',
        'amount' => 'Montante',
        'user_id' => 'Do utilizador',
        'id' => 'identidade',
        'status_order' => 'Status do pedido',
        'shipping_status' => 'Status de envio',
        'shipping_track' => 'Número de rastreamento de remessa',
        'shipping_label' => 'URL do rótulo de envio',
        'payment_status' => 'Status do pagamento',
        'payment_method' => 'Método de pagamento',
        'payment_reference' => 'Referência de pagamento',
        'description' => 'Descrição',
        'type' => 'Tipo',
        'sku_code' => 'Código de SKU',
        'quantity' => 'Quantidade',
        'order_primary' => 'Ordem #',
        'page_link' => 'URL',
        'file' => 'Arquivo',
        'address_one' => 'Endereço 1',
        'address_two' => 'Endereço 2',
        'city' => 'Cidade',
        'state' => 'Estado',
        'zip' => 'Fecho eclair',
        'country' => 'País',
        'method' => 'Método',
        'refund_method'=>'Refund Method',
        'reverse_payout'=>'Reverse Payout',


    ],
    'wishlist' => [
        'product' => 'produtos',
    ],
    'product' => [
        'image' => 'Imagem',
        'name' => 'Nome',
        'title_name' => 'Nome do Produto',
        'type' => 'Tipo',
        'type_option' => [
            'simple' => 'Simples',
            'variable' => 'Variável',
        ],
        'price' => 'Preço',
        'shippable' => 'Shippable',
        'brand' => 'Marca',
        'categories' => 'Categorias',
        'tags' => 'Tag',
        'description' => 'Descrição',
        'status_product' => 'Produtos Ativos',
        'average_rating' => 'Average Rating',
        'sku_code' => 'Código de SKU',
        'caption' => 'Rubrica',
        'properties' => 'Propriedades',
        'slug' => 'Lesma',
        'regular_price' => 'Preço regular',
        'sale_price' => 'Preço de venda',
        'allowed_quantity' => 'Quantidade permitida por pedido',
        'inventory' => 'Inventário',
        'type_options' => [
            'finite' => 'Finito',
            'bucket' => 'Balde',
            'infinite' => 'Infinito',
        ],
        'help' => '0 significa que a quantidade não é restrita',
        'variation_options' => 'Opções de Variação',
        'bucket_options' => [
            'in_stock' => 'Em estoque',
            'out_of_stock' => 'Fora de estoque',
            'limited' => 'Limitado',
        ],
        'tax_classes' => 'Classes Fiscais',
        'is_featured' => 'Destaque',
        'width' => 'Largura',
        'height' => 'Altura',
        'length' => 'comprimento',
        'weight' => 'Peso',
        'external' => 'Externo',
        'help_external' => 'Os usuários serão redirecionados para este link quando o clique "Adicionar ao carrinho"',
        'external_url' => 'URL externo',
        'downloads_enabled' => 'Downloadable',
        'private_content_page' => 'Acesso a páginas de conteúdo privado',
        'posts' => 'Posts e Páginas',
        'gateway_status' => 'Status do Gateway',
        'global_option' => 'Opções Globais',
    ],
    'shipping' => [
        'priority' => 'Prioridade',
        'shipping_method' => 'método de envio',
        'country' => 'País',
        'status_options' => [
            'active' => 'Ativo',
            'pending' => 'Pendente',
            'expired' => 'Expirado',
        ],
        'rate' => 'Taxa',
        'description' => 'Descrição',
        'help' => 'necessário apenas para o método de envio plano',
        'help_num_higher' => 'Número mais baixo tem maior prioridade',
    ],
    'sku' => [
        'image' => 'Imagem',
        'code' => 'Código',
        'price' => 'Preço',
        'inventory' => 'Inventário',
        'dt_options' => 'Opções',
        'regular_price' => 'Preço regular',
        'sale_price' => 'Preço de venda',
        'allowed_quantity' => 'Quantidade permitida por pedido',
        'code_sku' => 'Código SKU',
        'clear' => 'Limpar imagem em miniatura',
        'width' => 'Largura',
        'height' => 'Altura',
        'length' => 'comprimento',
        'weight' => 'Peso',
        'downloads_enabled' => 'Downloadable',
        'inventory_value' => 'Valor do Inventário',
        'help' => '0 significa que a quantidade não é restrita',
    ],
    'tag' => [
        'name' => 'Nome',
        'slug' => 'Lesma',
        'products_count' => '# Produtos',
    ],
    'shop' => [
        'quantity' => 'Quantidade',
    ],


];
