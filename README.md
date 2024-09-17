A live demo is here:
http://moygen.rf.gd/graph2/index.html

This is a javascript and php program for four coloring any graph. Although it would be difficult to test on every possible graph, it has solved hundreds of 300 or fewer vertices. I use delaunay triangulation to generate random graphs, and these graphs may be modified, either with or without delaunay triangulation. The php is used for saving and loading graphs to and from a text file. To use these functions, set the usePHP variable in index.html to true, and chmod the data folder to 777.

The best part of this program, I think, is watching the animation of the algorithm solving the graph at a human observable pace. The algorithm sorts the vertices by number of neighbors and 
