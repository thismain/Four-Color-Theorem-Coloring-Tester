The live Desktop demo is here:
http://moygen.rf.gd/graph2/desktop.html

The live Mobile demo is here:
http://moygen.rf.gd/graph2/index.html

[![Screenshot of Graph Four-Coloring](http://moygen.rf.gd/graph2/Screenshot_47.png)](http://moygen.rf.gd/graph2/index.html)

This is a javascript program for four coloring any graph. Although it would be difficult to test on every possible graph, it has solved hundreds of 300 or fewer vertices. I use delaunay triangulation, from [Joshua Bell's code](https://travellermap.com/tmp/delaunay.js), to generate random graphs, and these graphs may be modified, either with or without delaunay triangulation. php is used for saving and loading graphs to and from a text file. To use these functions, set the usePHP variable in index.html to true, chmod the data folder to 777, and change the paths to point to your server.

The best part of this program, I think, is watching the animation of the algorithm solving the graph at a human observable speed. The algorithm sorts the vertices by number of neighbors and uses high priority colors on vertices of high degree of connectivity, which get colored first, and low priority colors on vertices of low degree of connectivity, which get colored last. After the algorithm has gone through the whole graph this way, it then goes back to the vertices for which no color was available. It searches the neighbors of the uncolored vertex for the neighbors with the fewest fellows of their own color. If there are more than one neighbors with only one fellow of the same color, the algorithm chooses the neighbor of the highest priority color. The algorithm assigns the color of that neighbor to the uncolored vertex and then repeats the same process for that neighbor, excluding the vertex which just took its color. When the algorithm goes into a loop of following the same circuit over and over, it kicks itself out of the loop with a random choice of either the second or third choice of neighbors from which to take a color, where the neighbors have been sorted by the number of fellows of the same color.

The reason I made this program is because I wanted to find out why the 4CT is true, and I reasoned that the best way to find that out would be to see why the algorithms that work do work, and how they can be made to work less well and broken. I wonder whether a neural network can learn from billions of correctly colored graphs to recognize patterns of strings of permutations of numbers of neighbors and immediately know what colors the vertices can be. So it would solve the graph the way a rubik's cube is solved, rather than searching for the correct solution in real time.


