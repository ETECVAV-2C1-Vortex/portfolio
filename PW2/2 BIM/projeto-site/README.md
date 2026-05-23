***

# Relatório de Planejamento e Proposta de Site: ChatBot Literário B2B

Documento técnico para o planejamento do portal **ChatBot Literário B2B**. Este relatório detalha a arquitetura, identidade visual e diretrizes de desenvolvimento para a atividade **M2-1** da disciplina de Programação Web II, focando em escalabilidade, segurança e alta conversão para o mercado corporativo.

---

## 1. Tema do Projeto
O projeto consiste em uma plataforma **SaaS (Software as a Service)** inserida no nicho de **Tecnologia, Literatura e E-commerce (B2B)**. O foco central é oferecer um serviço de mentoria literária automatizada baseada em IA para otimizar processos de venda em livrarias e marketplaces.

## 2. Proposta do Site
O portal atuará como a principal **Landing Page comercial** e vitrine tecnológica do produto.
*   **Objetivo:** Comercializar assinaturas B2B e fornecer uma demonstração funcional do motor de IA através de um *widget*.
*   **O que o usuário encontrará:** Apresentação das vantagens da IA, planos de assinatura e um chat interativo para desafios de escrita e recomendações de livros.
*   **Resolução de Problemas:** Resolvemos a baixa conversão de vendas por recomendações genéricas (B2B) e a dificuldade do leitor em encontrar a obra ideal em catálogos vastos (B2C).

## 3. Definição do Público-Alvo
O sistema é direcionado a dois perfis que demandam interatividade e resultados:
*   **Público Direto (B2B):** Gestores de e-commerce e donos de livrarias que buscam aumento de vendas e *insights* de mercado.
*   **Público Indireto (B2C):** Leitores, estudantes e entusiastas da literatura entre **25 e 60 anos** que buscam mentoria de escrita e curadoria personalizada.

## 4. Estratégia Mobile First e Responsividade
Seguindo a metodologia **Mobile First**, o desenvolvimento prioriza dispositivos móveis para garantir performance antes da adaptação para desktop.
*   **Justificativa Técnica:** Otimização do carregamento e usabilidade superior em dispositivos de mão.
*   **Adaptação Progressiva:** O CSS base estiliza o mobile, e Media Queries (**`@media (min-width: 768px)`**) aplicam ajustes para resoluções maiores.
*   **Cuidados Técnicos:**
    *   **Menu:** Modelo hambúrguer interativo para preservar espaço.
    *   **Imagens:** Uso de `max-width: 100%` para garantir fluidez.
    *   **Tipografia:** Unidades relativas (rem/em) para assegurar legibilidade.
    *   **Layout:** Emprego de **Flexbox** com `flex-direction: column` para mobile, transicionando para `row` em desktops.

## 5. Identidade Visual
A identidade busca o equilíbrio entre a tradição literária e a modernidade tecnológica:
*   **🎨 Regra 60-30-10 (Cores):**
    *   **60% (Dominante):** Fundo Escuro (Dark Mode) para sofisticação.
    *   **30% (Secundária):** Azul Tecnológico para menus e botões secundários.
    *   **10% (Destaque):** Dourado Vibrante para CTAs (*Call to Action*) e botões de conversão.
*   **🔤 Fontes:** Mistura de *Playfair Display* (títulos clássicos) e *Roboto* (textos técnicos).
*   **🖼️ Logo:** Uma pena de escrita clássica com traços modernos e minimalistas.
*   **🏢 Dados Fictícios:**
    *   **Nome:** StanzAI Tecnologia Literária.
    *   **Contato:** (11) 99999-9999 | contato@[nome].com.br.
    *   **Endereço:** Jundiaí, SP.

## 6. Estrutura Inicial e Navegação
Adotamos a estrutura **One Page** para reduzir a fricção no processo de decisão do cliente:
*   **Home (Hero):** Título de impacto e botão "Testar Agora" que dispara o bot.
*   **Como Funciona:** Explicação visual da mentoria e desafios literários.
*   **Benefícios:** Foco em conversão de vendas e relatórios de dados para a loja.
*   **Planos:** Tabela de preços para integração SaaS.
*   **Rodapé (Footer):** Contatos, redes sociais e créditos, unificados via `require_once`.

## 7. Recursos Tecnológicos
*   **Widget Flutuante:** Janela de chat sempre disponível no canto inferior direito.
*   **Formulário de Conversão:** Para lojistas solicitarem demonstrações personalizadas.
*   **Integração de IA:** Demonstração de algoritmos de rima e sinônimos.

---