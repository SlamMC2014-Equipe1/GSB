<?php
/**
 * Classe Graph
 * Permet de généré des graphes
 */
class Graph {
    const PATH_IMAGES = 'images/graphs';
    const PATH_PLUGIN = 'plugin/mtChart/mtChart.php';
    const PATH_COLORS = 'plugin/mtChart/Colors';
    const PATH_FONTS = 'plugin/mtChart/Fonts';
    
    /**
     * Méthode qui crée/met à jour l'image d'un graphe de type camembert
     */
    public function getPieChart(array $labels, array $values, $width, $height, $namePic) {
        // Inclusion de la librairie
        include_once(self::PATH_PLUGIN);
        
        $Graph = new mtChart($width, $height);
        $Graph->addPoint($values,"Serie1");
        $Graph->addPoint($labels,"Serie2");
        $Graph->addAllSeries();
        $Graph->setAbsciseLabelSerie("Serie2");

        // Initialise the graph
        $Graph->loadColorPalette(self::PATH_COLORS."/softtones.txt");
        $Graph->drawFilledRoundedRectangle(7,7,293,193,5,240,240,240);
        $Graph->drawRoundedRectangle(5,5,295,195,5,230,230,230);

        // This will draw a shadow under the pie chart
        $Graph->drawFilledCircle(122,102,70,200,200,200);

        // Draw the pie chart
        $Graph->setFontProperties(self::PATH_FONTS.'/DejaVuSansCondensed.ttf', 8);
        $Graph->setAntialiasQuality(0);
        $Graph->drawBasicPieGraph(120,100,70,PIE_LABELS,255,255,218);
        //$Graph->drawPieLegend(230,15,250,250,250);

        $Graph->Render(self::PATH_IMAGES.'/'.$namePic);
    }
}
?>
