library(ggplot2)

data <- read.csv('../sales.csv')


#Saving First Plot  into 1.png
png(filename="graphs/hourly.png")
plot(data$Hour,data$Sales,xlab="Hour",ylab="Sales")
lines(data$Hour,data$Sales,xlab="Hour",ylab="Sales")
dev.off()
