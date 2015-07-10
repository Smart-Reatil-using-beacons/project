library(ggplot2)

inv <- read.csv('../inventory.csv')


#Saving First Plot  into 1.png

png(filename="graphs/inventory.png")
plot(inv$Name,inv$Sales_Rate,xlab="Product",ylab="Sales Rate")
#lines(inv$Name,inv$Sales_Rate,xlab="Product",ylab="Sales Rate")
dev.off()
