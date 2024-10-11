The live Desktop demo is here:
http://moygen.rf.gd/graph2/desktop.html

The live Mobile demo is here:
http://moygen.rf.gd/graph2/index.html

[![Screenshot of Graph Four-Coloring](http://moygen.rf.gd/graph2/screenshotter.png)](http://moygen.rf.gd/graph2/desktop.html)

This is a javascript program for four coloring any graph. Although it would be difficult to test on every possible graph, it has solved hundreds of 600 or fewer vertices. The lowest time to solve for 600 vertices was 31ms, though the average time is around 300ms. I use delaunay triangulation, from [Joshua Bell's code](https://travellermap.com/tmp/delaunay.js), to generate random graphs, and these graphs may be modified, either with or without delaunay triangulation. 

The best part of this program, I think, is watching the animation of the algorithm solving the graph at a human observable speed. 

The algorithm:
I recently found a faster way. I had been sorting the vertices by number of neighbors, and using high priority colors on vertices of high degree of connectivity, which would get colored first, and low priority colors on vertices of low degree of connectivity, which would get colored last. However, It turns out, it's faster to just go through the vertices as they were set down when building the graph, from the top of the screen to the bottom, applying colors in the same order each time, when they can be applied without conflict.

After the algorithm has gone through the whole graph this way, it then goes back to the vertices for which no color was available. It searches the neighbors of the uncolored vertex for the neighbors with the fewest fellows of their own color. If there are more than one neighbors with only one fellow of the same color, the algorithm chooses the neighbor of the highest priority color. The algorithm assigns the color of that neighbor to the uncolored vertex and then repeats the same process for that neighbor, excluding the vertex which just took its color.

When the algorithm goes into a loop of following the same circuit over and over, it kicks itself out of the loop with a random choice of either the second or third choice of neighbors from which to take a color, where the neighbors have been sorted by the number of fellows of the same color.

Finally, the algorithm triple checks the graph for any neighboring vertices of the same color and proceeds in the same manner to fix them.

The reason I made this program is because I wanted to find out why the 4CT is true, and I reasoned that the best way to find that out would be to see why the algorithms that work do work, and how they can be made to work less well and broken.

I wonder whether a neural network can learn from billions of correctly colored graphs to recognize patterns in strings of permutations of numbers of neighbors and immediately know what colors the vertices can be. So it would solve the graph the way a rubik's cube is solved, rather than searching for the correct solution in real time.

------------

What would a sufficient reason require? Obviously, it would need to explain why five colors are never necessary, but it would also need to show why three colors are sometimes not possible, and what are the conditions that must occur for a three-colorable graph to become a four-colorable one. An analysis of how a graph can, or must, be modified to go from requiring only three colors, to requiring four colors, and also from two to three, and from one to two, would be useful. I'd love to identify and parameterize some property or properties of planar graphs that results in the flexibility we find in assigning colors. But for such a property to be proven to be the operative four-coloring mechanism one would need to show that only the coloring algorithms that exploit this property work, and algorithms that do not exploit this property do not work, and those that only partly make use of this property only partly work. Which task would require that one had first set up the environment for testing several and various algorithms, so as to compare and rate their performance. To this end I imagine identifying the complete set of discrete components which comprise every four coloring algorithm, and from this set of modules choosing, and their parameters adjusting in turn, so as to evaluate the change in effectiveness wrought thereby.


In reality my code is very messy, but still I dream.

What might those modules be? Let's number them:

1) Sorting nodes by numbers of neighbors
2) Assigning the four colors levels of priority
3) Sorting neighbors by number of a color
4) Behavior when no color is available
5) Color transfer from neighbor to uncolored node, or to a conflicted node
6) Loop detection and breaking
7) Self checking the result
8) Order of coloring
9) ...

It turns out to have been unnecessary to worry about complexity increasing with increasing numbers of vertices and with increasing numbers of connections for each node. The hardest graph anyone can contrive will be trivial to color by a sufficient algorithm. There's always enough flexibility in the choice of colors so as to allow for changing colors along a path until a node is encountered that is only neighbored by nodes of two colors, or by one. I think it's worthwhile to mention at the start of anyone's exposure to the 4CT that if four colors are randomly dropped onto one thousand randomly built graphs, the ratio of differently colored neighbors to same colored neighbors averages out to three to one; three differently colored neighbors for every one that is the same color, or 75% different, 25% same.


